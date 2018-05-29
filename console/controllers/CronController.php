<?php
namespace console\controllers;

use console\components\excel_mysql\Excel_mysql;
use yii\console\Controller;

class CronController extends Controller
{
    public function actionExcel()
    {

// Подключаем библиотеку
        require_once __DIR__ . "/../components/excel_mysql/PHPExcel/Classes/PHPExcel.php";
// Подключаем модуль
        require_once __DIR__ . "/../components/excel_mysql/library/excel_mysql.php";

// Определяем константу для включения режима отладки (режим отладки выключен)
        define("EXCEL_MYSQL_DEBUG", false);

// Соединение с базой MySQL
        $connection = new \mysqli("localhost", "root", "", "lion");
//// Выбираем кодировку UTF-8
        $connection->set_charset("utf8");

// Создаем экземпляр класса excel_mysql
        $excel_mysql_import_export = new Excel_mysql($connection, __DIR__ . "/../components/excel_mysql/example/example.xlsx");


// DROP Table

        if (mysqli_query($connection, "DROP TABLE excel")) {
            echo "Table is deleted successfully\n\n";
        } else {
            echo "Table is not deleted successfully\n\n";
        }


// DROP EXCEL TO SQL
        echo $excel_mysql_import_export->excel_to_mysql_by_index(
            "excel",
            0,
            array(
                "code",
                "name",
                "analogs",
                "cars",
                "fabricator",
                "quantity",
                "price",
                "currency",
                "note",
                null,
                "store",
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ),
            2,
            false,
            false,
            false,
            array(
                "TEXT",
                "TEXT",
                "TEXT",
                "TEXT",
                "TEXT",
                "int(11)",
                "DECIMAL(10,2)",
                "TEXT",
                "TEXT",
                null,
                "TEXT",
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            )
        ) ? "EXPORT OK\n\n" : "EXPORT FAIL\n\n";

// ADD PRIMARY KEY
        if (mysqli_query($connection, "ALTER TABLE excel ADD id int(10) unsigned AUTO_INCREMENT PRIMARY KEY")) {
            echo "PRIMARY KEY successfully\n\n";
        } else {
            echo "PRIMARY KEY FAIL\n\n";
        }
    }
}