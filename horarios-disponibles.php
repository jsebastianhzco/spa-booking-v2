<?php

class Schedule
{
    private string $fecha;
    private string $day;
    private array $horariosDisponibles = [
        "Monday" => ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"],
        "Tuesday" => ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30"],
        "Wednesday" => ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"],
        "Thursday" => ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30"],
        "Friday" => ["09:00", "09:30", "10:00", "10:30", "11:00", "11:30"]
    ];

    public function __construct(string $fecha)
    {
        $this->fecha = $fecha;
        $this->day = date("l", strtotime($fecha));
    }

    public function render(): string
    {
        if (!isset($this->horariosDisponibles[$this->day])) {
            return '';
        }

        $output = '';
        $count = 0;

        foreach ($this->horariosDisponibles[$this->day] as $hora) {
            if ($count % 4 === 0) {
                $output .= '<tr>';
            }

            $output .= "<td class='pd-5'><button type='button' table-data='{$hora}' class='tabla btn btn-success'>{$hora}</button></td>";

            $count++;

            if ($count % 4 === 0) {
                $output .= '</tr>';
            }
        }

        if ($count % 4 !== 0) {
            $output .= '</tr>';
        }

        return $output;
    }
}

// Uso:
$fecha = $_GET['fecha'] ?? '';
if ($fecha) {
    $schedule = new Schedule($fecha);
    echo $schedule->render();
}
?>
