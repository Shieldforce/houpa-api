<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="product-index">Proposta</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8081/api/product/',
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
        <code class="higlighted">{{ route("api.product.index") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Lista de Usuários mostrada com sucesso!",
        "data": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "Usuário de Teste",
                    "email": "teste@teste",
                    "email_verified_at": null,
                    "created_at": "2021-11-25T17:27:48.000000Z",
                    "updated_at": "2021-11-25T17:27:48.000000Z"
                }
            ],
            "first_page_url": "http://localhost:8080/api/users?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://localhost:8080/api/users?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://localhost:8080/api/users?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://localhost:8080/api/users",
            "per_page": 20,
            "prev_page_url": null,
            "to": 1,
            "total": 1
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
        </tbody>
    </table>
</div>
