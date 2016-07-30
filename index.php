<?php
class file{
    
 //循环遍历文件夹
 function filedir($filedir){
         if($handle = opendir($filedir)){
          while (false !== ($file = readdir($handle))){
              echo "$file";
              echo "<p>";
          }
         }   
    
    }
 //递归遍历文件夹
function fileRecursion($filedir){
    $dir = dir($filedir);//将目标目录转为目录对象
    while($file = $dir->read()){//通过目录对象 read()函数读取目录
        if(is_dir("$filedir/$file")&&($file!=".")&&($file!="..")){//如果是文件夹       
            echo "文件夹$file";
            echo "<p>";
           @file("$filedir/$file");//递归调用   出错：文件夹权限！！！！！！！！！！
        }
        else {
            echo "文件$file";  
            echo "<p>";
        }
    }         
    $dir->close();
    }
}
//创建对象
$test = new file();

//$filedir="d:/xampp/htdocs/traversalFile";
$filedir=getcwd();/////获取当前工作目录

echo "循环遍历文件夹:<p>";
echo "<p>";
$test->filedir($filedir);
echo "<p>";

echo "递归遍历文件夹:<p>";
$test->fileRecursion($filedir);




?>