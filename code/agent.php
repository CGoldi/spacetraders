<?php

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $url = 'https://api.spacetraders.io/v2/register';
            $agent_data = ['symbol' => $_POST['agent'], 'faction' => 'COSMIC'];

            $options = [
                'http' => [
                    'header' => "Content-type: application/json\r\n",
                    'method' => 'POST',
                    'content' => json_encode($agent_data),
                ],
            ];
            
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            $data = json_decode($result, true);

            $token = $data['data']['token'];

            header("Location: index.php?agent={$token}");
        }

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $url = 'https://api.spacetraders.io/v2/my/agent';
            $token = $_GET['agent'];
            $options = [
                'http' => [
                    'header' => "Authorization: Bearer {$token}",
                    'method' => 'GET',
                ],
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            header("Location: index.php?agent={$token}&info={$result}");
        }
?>