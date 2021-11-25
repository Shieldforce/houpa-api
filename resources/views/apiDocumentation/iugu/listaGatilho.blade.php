<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="listaGatilho">Lista de Gatilhos</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => '{url dominio}/api/iuguAPI/listaGatilho',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
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
        (GET) A URL de requisição para está ação é :<br>
        <code class="higlighted">{{ route("api.iuguAPI.listaGatilho") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Lista de gatilhos!",
        "data": [
            {
                "id": "2BF9F6EC11A54557A08157ACE5D0EB9D",
                "url": "http://localhost:8081/api/notificationIugu",
                "authorization": "apiiugu123456",
                "event": "invoice.status_changed",
                "active": true
            },
            {
                "id": "D47509E30E7C4EB885E8B2C0CA5980B9",
                "url": "http://localhost:8081/api/notificationIugu",
                "authorization": "apiiugu123456",
                "event": "invoice.created",
                "active": true
            }
        ],
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
        </tbody>
    </table>
</div>
