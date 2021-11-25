<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="criarGatilho">Criar Gatilho</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => '{url dominio}/api/iuguAPI/criarGatilho',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'event'         => 'invoice.created',
            'url'           => 'http://localhost:8081/api/notificationIugu',
            'authorization' => 'apiiugu123456'
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer {token}'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
    </code>
    </pre>
    <p>
        (POST) A URL de requisição para está ação é :<br>
        <code class="higlighted">{{ route("api.iuguAPI.criarGatilho") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Gatilho criado com sucesso!",
        "data": {
            "id": "D47509E30E7C4EB885E8B2C0CA5980B9",
            "url": "http://localhost:8081/api/notificationIugu",
            "authorization": "apiiugu123456",
            "event": "invoice.created",
            "active": true
        },
        "url": null
    }
    </code>
    </pre>
    <h4>Parâmetros para esta requisição</h4>
    <table>
        <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo</th>
            <th>Descrição</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Autorization</td>
            <td>Header</td>
            <td>(Obrigatório) Esté parâmetro é passado no Header (Bearer {token}) | Expira em 1 hora</td>
        </tr>
        <tr>
            <td>event</td>
            <td>string</td>
            <td>(Obrigatório) Nome do evento desejado Lista:
                [
                    "invoice.created" => "Quando uma fatura é criada",
                    "invoice.status_changed" => "Quando o status da fatura é alterado,
                ]
            </td>
        </tr>
        <tr>
            <td>url</td>
            <td>string</td>
            <td>(Obrigatório) Endpoint para qual o gatilho será enviado</td>
        </tr>
        <tr>
            <td>authorization</td>
            <td>string</td>
            <td>
                (Opcional) Grave uma chave / key para usar como "Basic Authentication" na validação do recebimento dos gatilhos.
            </td>
        </tr>
        </tbody>
    </table>
</div>
