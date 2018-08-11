<?php
namespace App;

class CsvImport 
{
    public static function csv_parse($filepath, $options = array())
    {
        if (!is_readable($filepath)) {
            return false;
        }
	// Merge default options
        $options = array_merge(array(
            'eol' => "\n",
            'delimiter' => ',',
            'enclosure' => '"',
            'escape' => '\\',
            'to_object' => false,
        ), $options);
    // Read file, explode into lines
        $string = file_get_contents($filepath);
        $lines = explode($options['eol'], $string);
	// Read the first row, consider as field names
        $header = array_map('trim', explode($options['delimiter'], array_shift($lines)));
    // Build the associative array
        $csv = array();
        foreach ($lines as $line) {
        // Skip if empty
            if (empty($line)) {
                continue;
            }
        // Explode the line
            $fields = str_getcsv($line, $options['delimiter'], $options['enclosure'], $options['escape']);
        // Initialize the line array/object
            $temp = $options['to_object'] ? new stdClass : array();
            foreach ($header as $index => $key) {
                $options['to_object']
                    ? $temp->{trim($key)} = trim($fields[$index])
                    : $temp[trim($key)] = trim($fields[$index]);
            }
            $csv[] = $temp;
        }
        return $csv;
    }
} 