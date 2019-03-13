<?php
namespace Futurelabs\Bootplant\Utils;

class ImportFileSeeding
{

    public static function read($file)
    {
        $return = [];
        $i      = 0;
        $row    = 0;
        if (($handle = fopen($file, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",", '"')) !== false) {
                $num = count($data);
                $row++;
                for ($c = 0; $c < $num; $c++) {
                    $return[$row][] = $data[$c];
                }
            }
            fclose($handle);
        }
        return $return;
    }
}
