<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="product-create">Proposta</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8081/api/product/create',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => {
        "name": "Produto 1",
        "description": "Desccrição produto 1",
        "price": 17.00,
        "imgs": [
            {
                "url" : "https://url.com.br/produto1.jpg",
                "main" : 1
            },
            {
                "url" : "https://url.com.br/produto2.jpg",
                "main" : 0
            },
            {
                "url" : "https://url.com.br/produto2.jpg",
                "main" : 0
            }
        ]
      },
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
        <code class="higlighted">{{ route("api.product.create") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
    "code": 50000,
    "status": "success",
    "message": "Sucesso ao criar produto!",
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
            <td>name</td>
            <td>string</td>
            <td>(Obrigatório) Campo name é uma simples string</td>
        </tr>
        <tr>
            <td>description</td>
            <td>text</td>
            <td>(Obrigatório) Campo texto com descrição do produto</td>
        </tr>
        <tr>
            <td>price</td>
            <td>decimal</td>
            <td>(Obrigatório) Campo preço é um decimal separado por ponto Exemplos: 15.00 (Quinze Reais), 1000.00 (Mil Reais)</td>
        </tr>
        <tr>
            <td>-</td>
            <td>-</td>
            <td>-</td>
        </tr>
        <tr>
            <td>imgs</td>
            <td>objeto</td>
            <td>(Opcional) Este campo é um objeto que contém imagens</td>
        </tr>
        <tr>
            <td>imgs.url</td>
            <td>string</td>
            <td>(Opcional/Obrigatório se campo imgs for passado) Campo Url da imagem</td>
        </tr>
        <tr>
            <td>imgs.main</td>
            <td>boolean</td>
            <td>(Opcional/Obrigatório se campo imgs for passado) Campo indica se a imagem será destaque desse produto</td>
        </tr>
        </tbody>
    </table>
</div>
