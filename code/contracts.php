<?php
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $url = 'https://api.spacetraders.io/v2/my/contracts';
            $token = $_GET['agent'];
            $options = [
                'http' => [
                    'header' => "Authorization: Bearer {$token}",
                    'method' => 'GET',
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            header("Location: index.php?agent={$token}&contracts={$result}");
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $token = $_POST['agent'];
            $contractid = $_POST['contractid'];
            $url = "https://api.spacetraders.io/v2/my/contracts/{$contractid}/accept";

            $options = [
                'http' => [
                    'header' => "Authorization: Bearer {$token}",
                    'method' => 'POST',
                ],
            ];
            
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            header("Location: index.php?agent={$token}");
        }
?>