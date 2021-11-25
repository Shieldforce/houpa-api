<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="criarMetodoDePagamento">CRIAR MÉTODO DE PAGAMENTO</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8081/api/iuguAPI/criarMetodoDePagamento',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'customer_id'      => '{customer_id}',
            'description'      => 'Cartão de Credito',
            'token'            => '{token gerado na função javascript da IUGU}',
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
        <code class="higlighted">{{ route("api.iuguAPI.criarMetodoDePagamento") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Metódo criado com sucesso!",
        "data": {
            "id": "DA05F19EE8334D05A10258D26BCF8607",
            "description": "cartão de crétido",
            "item_type": "credit_card",
            "customer_id": "22801AC9324D409A99F24CEE099DBA28",
            "data": {
                "brand": "Visa",
                "holder_name": "NOME SOBRENOME",
                "display_number": "XXXX-XXXX-XXXX-1111",
                "bin": "411111",
                "year": 2027,
                "month": 12,
                "last_digits": "1111",
                "first_digits": "411111",
                "masked_number": "XXXX-XXXX-XXXX-1111"
            }
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
            <td>customer_id</td>
            <td>string</td>
            <td>(Obrigatório) ID do Cliente</td>
        </tr>
        <tr>
            <td>description</td>
            <td>string</td>
            <td>(Obrigatório) Descrição</td>
        </tr>
        <tr>
            <td>token</td>
            <td>string</td>
            <td>(Opcional) Token de Pagamento criar</td>
        </tr>
        </tbody>
    </table>
</div>
