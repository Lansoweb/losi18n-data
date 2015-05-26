<?php
namespace LosI18n\Formatter;

class CsvFormatter extends AbstractFormatter
{

    public function format(array $data)
    {
        $outstream = fopen('php://temp', 'r+');
        fputcsv($outstream, array(
            'iso',
            'name'
        ));
        foreach ($data as $iso => $name) {
            fputcsv($outstream, array(
                $iso,
                $name
            ));
        }
        rewind($outstream);
        $csv = stream_get_contents($outstream);
        fclose($outstream);
        return $csv;
    }

    public function getExtension()
    {
        return 'csv';
    }
}