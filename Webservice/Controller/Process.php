<?php
/**
 *
 */
class Process
{
    private $filePath;
    private $directory;

    public function __construct($file_path = null) {
      $this->directory = "../Writer";
      if (!is_dir($this->directory)) {
        mkdir($this->directory, 0755, true);
      }
      $this->filePath = $file_path ?: "../Writer/logs.txt";
    }

    public function updateFile($text = null) {
      if ($text != null) {
        try {
          $my_file = fopen($this->filePath, "a");
          fwrite($my_file, $text . PHP_EOL);
        } catch (\Exception $e) {
          return false;
        } finally {
          fclose($my_file);
        }
        return true;
      }
    }
}
