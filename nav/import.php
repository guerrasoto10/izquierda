<?php
include "database.php";
include "class.upload.php";
if(isset($_FILES["name"])){
	$up = new Upload($_FILES["name"]);
	if($up->uploaded){
		$up->Process("./uploads/");
		if($up->processed){
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            $row=0;
            for ($row = 7; $row <= $highestRow; $row++){ 

                $x_Factura = $sheet->getCell("A".$row)->getValue();
                $x_Fecha = $sheet->getCell("B".$row)->getValue();
                $x_Cliente = addslashes($sheet->getCell("S".$row)->getValue());
                $x_RIF_Cliente = $sheet->getCell("Q".$row)->getValue();
                $x_Cod_Cliente = $sheet->getCell("R".$row)->getValue();
                $x_Descripcion = addslashes($sheet->getCell("D".$row)->getValue());
                $x_Base = $sheet->getCell("H".$row)->getValue();
                $x_Importe = $sheet->getCell("I".$row)->getValue();
                $x_Costo = $sheet->getCell("J".$row)->getValue();
                $sql = "insert into person (Factura, Fecha, Cliente, RIF_Cliente, Cod_Cliente, Descripcion, Base, Importe, Costo) value ";
                $sql .= " (\"$x_Factura\",\"$x_Fecha\",\"$x_Cliente\",\"$x_RIF_Cliente\",\"$x_Cod_Cliente\",\"$x_Descripcion\",\"$x_Base\",\"$x_Importe\",\"$x_Costo\")";
               $con->query($sql);
            }

    	unlink($archivo);
        }	

}
}
echo "<script>
window.location = './index.php';
</script>
";
?>
