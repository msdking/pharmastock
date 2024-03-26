<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
use Illuminate\Support\Facades\DB;
if(DB::connection()->getPdo()){
    echo "Successfully connected to DB and DB name is " . DB::connection()->getDatabaseName();


       }
   ?>
</body>
</html>
<!-- heda testi bih database te3k ila rehi khdema w dek getname chof asque nom te3a reh kima li f laragon
