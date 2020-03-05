<?php

namespace Services;

use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class XmlReportWriter
{

    public $data;
    public $template;
    public $filename;
    public $path;
    protected static $factory;
    protected $spreadsheet;
    protected $writer;

    public function __construct()
    {
        self::$factory = IOFactory::class;
    }

    public function generate($data, $template, $filename, $path)
    {

        $this->data = $this->prepare($data);
        $this->filename = $filename;
        $this->template = $template;
        $this->patn = $path;

        $this->spreadsheet = self::$factory::load($this->template);
        try {
            $worksheet = $this->spreadsheet->setActiveSheetIndex(0);

            foreach ($this->data[0] as $key => $value) {
                $worksheet->getCell($key)->setValue($value);
            }

            $worksheet = $this->spreadsheet->setActiveSheetIndex(1);

            foreach ($this->data[1] as $key => $value) {
                $worksheet->getCell($key)->setValue($value);
            }

        } catch (\Exception $e) {
            echo "Error generate data: " . $e->getMessage() . PHP_EOL;
        }

        // $this->save($filename);

        return $this;
    }

    public function prepare($data)
    {
        return [
            0 => [
                'B19' => "{$data['D5']} грузовых мест",
                'B21' => "{$data['D3']} кг брутто, {$data['D4']} м3",
                'CM9' => $data['D1'],
                'B66' => $data['D2'],
                'BI9' => $data['D2'],
            ],
            1 => [
                'AE41' => $data['D2'],
                'CG41' => $data['D2'],

            ]
        ];


    }

    public function save()
    {
        try {

            $this->writer = self::$factory::createWriter($this->spreadsheet, 'Xls');
            $this->writer->save($this->patn);

        } catch (\Exception $e) {
            echo "Failed save docx: " . $e->getMessage() . PHP_EOL;
        }

    }

    public function download()
    {
        $this->writer = new Xlsx($this->spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=$this->filename");

        $this->writer->save("php://output");

    }

}