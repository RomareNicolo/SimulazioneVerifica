<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $fileName = 'sospettati.json';
        $userData = file_exists($fileName) ? json_decode(file_get_contents($fileName),true) : array();
        if($userData === null){
            $userData = array();
        }
        
        foreach($userData as $user => $caseData){
            echo "<h2>$user </h2>";
            if(!empty($caseData)){
                echo "<table border='1'>
                        <tr>
                            <th>Select</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>Eta</th>
                            <th>Nazionalita</th>
                            <th>Tatuaggio</th>
                            <th>Fumatore</th>
                        </tr>";
                        foreach ($caseData as $key => $rowData) {
                            echo "<tr>
                                    <td><input type='radio' name='selectedRow[$user]' value='$key'></td>
                                    <td>{$rowData['Nome']}</td>
                                    <td>{$rowData['Cognome']}</td>
                                    <td>{$rowData['Eta']}</td>
                                    <td>{$rowData['Nazionalita']}</td>
                                    <td>{$rowData['Tatuaggio']}</td>
                                    <td>{$rowData['Fumatore']}</td>
                                </tr>";
                        }
                        echo "</table>";
            }else{
                echo "<h2>table empty</h2>";
            }
        }
    ?>
</head>
<body>
    
</body>
</html>