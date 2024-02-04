<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Shared\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FormExport implements FromCollection, WithStyles, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function collection()
    {
        return collect($this->data);
    }

    public function styles(Worksheet $sheet)
    {

        $currentDate = date('Y-m-d');
        $currentDay = date('l');
        $currentTime = date('H:i');
        // Isi nilai ke dalam file Excel sesuai dengan template
        $sheet->mergeCells('B5:D5');
        $sheet->mergeCells('E2:G2');
        $sheet->mergeCells('H2:J2');
        $sheet->mergeCells('E3:G3');
        $sheet->mergeCells('H3:J3');
        $sheet->mergeCells('E4:F4');
        $sheet->mergeCells('G4:H4');
        $sheet->mergeCells('I4:J4');
        $sheet->mergeCells('E5:F5');
        $sheet->mergeCells('E6:F6');
        $sheet->mergeCells('B7:C7');
        $sheet->mergeCells('D7:E7');
        $sheet->mergeCells('F7:G7');
        $sheet->mergeCells('H7:J7');
        $sheet->mergeCells('C8:I8');
        $sheet->mergeCells('F10:G10');
        $sheet->mergeCells('E14:F14');
        $sheet->mergeCells('G14:H14');
        $sheet->mergeCells('I14:J14');

        $sheet->setCellValue('B5', 'Politenik Astra');
        $sheet->setCellValue('E2', 'NAMA FORM');
        $sheet->setCellValue('H2', 'NOMOR FORM');
        $sheet->setCellValue('E3', 'JAM PLUS');
        $sheet->setCellValue('E4', 'Nama Mahasiswa');
        $sheet->setCellValue('G4', 'Tingkat / Prodi');
        $sheet->setCellValue('I4', 'No. Absen');
        $sheet->setCellValue('B7', 'KEGIATAN (pilih ; beri tanda x)');
        $sheet->setCellValue('D7', '  [   ]  PRODUKSI');
        $sheet->setCellValue('F7', '  [   ]  ACARA PRODI');
        $sheet->setCellValue('H7', '  [   ]  ACARA POLMAN / BEM');
        $sheet->setCellValue('C8', 'T U G A S');
        $sheet->setCellValue('C9', 'Pada Tanggal :');
        $sheet->setCellValue('G9', 'Hari :');
        $sheet->setCellValue('C10', 'Pada Waktu :');
        $sheet->setCellValue('C11', 'Tugas :');
        $sheet->setCellValue('F10', 'Sampai Dengan :');
        $sheet->setCellValue('B12', 'Other :');
        $sheet->setCellValue('E14', 'JAM PLUS');
        $sheet->setCellValue('G14', 'PEMBERI TUGAS');
        $sheet->setCellValue('I14', 'WALI TINGKAT');
        $sheet->setCellValue('B14', '1.');
        $sheet->setCellValue('B15', '2.');
        $sheet->setCellValue('B16', '3.');
        $sheet->setCellValue('A1', '');
        $sheet->setCellValue('B1', '');
        $sheet->setCellValue('C1', '');
        $sheet->setCellValue('E5', $this->data[0]['Nama'] ?? '');
        $sheet->setCellValue('E15', $this->data[0]['Jam_Plus'] ?? '');

        // ... (menyertakan seluruh isian yang Anda inginkan)

        // Tambahkan border dari A1 sampai K17
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $styleArrayCenter = [
            'font' => [
                'bold' => true,
                'size' => 7,
                'name' => 'arial'
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // align right horizontally
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // align center vertically
            ],
        ];

        $styleArrayCenterFill = [
            'font' => [
                'bold' => false,
                'size' => 8,
                'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // align center horizontally
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // align center vertically
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '#C0BCC4', // Warna abu-abu
                ],
            ],
        ];

        $styleArrayBold = [
            'font' => [
                'bold' => true,
                'name' => 'Arial',
                'size' => 8,
            ],
        ];
        $styleArrayRight = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT, // align right horizontally
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // align center vertically
            ],
        ];
        $styleArrayLeft = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, // align right horizontally
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // align center vertically
            ],
        ];
        $styleArrayabu = [
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '999999', // Light gray color
                ],
            ],
        ];

        $styleArrayBottom = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $sheet->getStyle('B2:J16')->applyFromArray($styleArray);
        $sheet->getStyle('B2:D6')->applyFromArray($styleArray);
        $sheet->getStyle('B14:D16')->applyFromArray($styleArray);
        $sheet->getStyle('E14:F16')->applyFromArray($styleArray);
        $sheet->getStyle('G14:H16')->applyFromArray($styleArray);
        $sheet->getStyle('B14:J16')->applyFromArray($styleArray);
        $sheet->getStyle('B8:J13')->applyFromArray($styleArray);
        $sheet->getStyle('E2:G2')->applyFromArray($styleArray);
        $sheet->getStyle('E2:G3')->applyFromArray($styleArray);
        $sheet->getStyle('H2:J2')->applyFromArray($styleArray);
        $sheet->getStyle('H2:J3')->applyFromArray($styleArray);
        $sheet->getStyle('E4:J6')->applyFromArray($styleArray);
        $sheet->getStyle('B7:C7')->applyFromArray($styleArray);
        $sheet->getStyle('D7')->applyFromArray($styleArray);
        $sheet->getStyle('F7')->applyFromArray($styleArray);
        $sheet->getStyle('H7')->applyFromArray($styleArray);
        $sheet->getStyle('E4:F4')->applyFromArray($styleArray);
        $sheet->getStyle('G4:H4')->applyFromArray($styleArray);
        $sheet->getStyle('I4:J4')->applyFromArray($styleArray);
        $sheet->getStyle('E14:F14')->applyFromArray($styleArray);
        $sheet->getStyle('G14:H14')->applyFromArray($styleArray);
        $sheet->getStyle('I14:J14')->applyFromArray($styleArray);

        $sheet->getStyle('D9:E9')->applyFromArray($styleArrayBottom);
        $sheet->getStyle('D10:E10')->applyFromArray($styleArrayBottom);
        $sheet->getStyle('H9:I9')->applyFromArray($styleArrayBottom);
        $sheet->getStyle('H10:I10')->applyFromArray($styleArrayBottom);
        $sheet->getStyle('D11:I11')->applyFromArray($styleArrayBottom);
        $sheet->getStyle('D12:I12')->applyFromArray($styleArrayBottom);

        $sheet->getStyle('B8')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('J8')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('E2')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('H2')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('E4')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('G4')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('I4')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('C8')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('E14')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('G14')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('I14')->applyFromArray($styleArrayCenterFill);
        $sheet->getStyle('E3')->applyFromArray($styleArrayBold);
        $sheet->getStyle('D7')->applyFromArray($styleArrayBold);
        $sheet->getStyle('F7')->applyFromArray($styleArrayBold);
        $sheet->getStyle('H7')->applyFromArray($styleArrayBold);
        $sheet->getStyle('C8')->applyFromArray($styleArrayBold);
        $sheet->getStyle('E14')->applyFromArray($styleArrayBold);
        $sheet->getStyle('G14')->applyFromArray($styleArrayBold);
        $sheet->getStyle('I14')->applyFromArray($styleArrayBold);
        $sheet->getStyle('C9')->applyFromArray($styleArrayBold);
        $sheet->getStyle('C10')->applyFromArray($styleArrayBold);
        $sheet->getStyle('C11')->applyFromArray($styleArrayBold);
        $sheet->getStyle('G9')->applyFromArray($styleArrayBold);
        $sheet->getStyle('F10')->applyFromArray($styleArrayBold);
        $sheet->getStyle('C9')->applyFromArray($styleArrayRight);
        $sheet->getStyle('C10')->applyFromArray($styleArrayRight);
        $sheet->getStyle('C11')->applyFromArray($styleArrayRight);
        $sheet->getStyle('D7')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('F7')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('H7')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('B14')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('B15')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('B16')->applyFromArray($styleArrayLeft);
        $sheet->getStyle('G9')->applyFromArray($styleArrayRight);
        $sheet->getStyle('F10')->applyFromArray($styleArrayRight);

        $sheet->getStyle('B5')->applyFromArray($styleArrayCenter);
        $sheet->getStyle('E3')->applyFromArray($styleArrayCenter);

        //ABU ABU
        $sheet->getStyle('E2:G2')->applyFromArray($styleArrayabu);
        $sheet->getStyle('H2:J2')->applyFromArray($styleArrayabu);
        $sheet->getStyle('E4:F4')->applyFromArray($styleArrayabu);
        $sheet->getStyle('G4:H4')->applyFromArray($styleArrayabu);
        $sheet->getStyle('I4:J4')->applyFromArray($styleArrayabu);
        $sheet->getStyle('B8:J8')->applyFromArray($styleArrayabu);
        $sheet->getStyle('E14:F14')->applyFromArray($styleArrayabu);
        $sheet->getStyle('G14:H14')->applyFromArray($styleArrayabu);
        $sheet->getStyle('I14:J14')->applyFromArray($styleArrayabu);

        $sheet->getStyle('E2:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('E2:G2')->getFill()->getStartColor()->setRGB('999999');
        $sheet->getStyle('H2:J2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('H2:J2')->getFill()->getStartColor()->setRGB('999999');
    }
}
