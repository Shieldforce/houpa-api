<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="product-show">Proposta</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8081/api/product/show/28',
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
        <code class="higlighted">{{ route("api.product.show") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Sucesso ao visualizar produto!",
        "data": {
            "id": 28,
            "name": "Produto 1",
            "description": "Desccrição produto 1",
            "price": "17.00",
            "created_at": "2021-11-25T18:11:59.000000Z",
            "updated_at": "2021-11-25T18:11:59.000000Z",
            "images": [
                {
                    "id": 65,
                    "url": "https://url.com.br/produto1.jpg",
                    "main": 1,
                    "product_id": 28,
                    "created_at": "2021-11-25T18:11:59.000000Z",
                    "updated_at": "2021-11-25T18:11:59.000000Z"
                },
                {
                    "id": 66,
                    "url": "https://url.com.br/produto2.jpg",
                    "main": 0,
                    "product_id": 28,
                    "created_at": "2021-11-25T18:11:59.000000Z",
                    "updated_at": "2021-11-25T18:11:59.000000Z"
                },
                {
                    "id": 67,
                    "url": "https://url.com.br/produto2.jpg",
                    "main": 0,
                    "product_id": 28,
                    "created_at": "2021-11-25T18:11:59.000000Z",
                    "updated_at": "2021-11-25T18:11:59.000000Z"
                }
            ]
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
            <td>id</td>
            <td>integer</td>
            <td>(Obrigatório) Campo ID do produto que deseja visualizar</td>
        </tr>
        </tbody>
    </table>
</div>
