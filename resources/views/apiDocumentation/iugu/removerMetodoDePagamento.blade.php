<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="removerMetodoDePagamento">Remover Método de Pagemento</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8081/api/iuguAPI/removerMetodoDePagamento/{customer_id}/{payment_id}',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
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
        (DELETE) A URL de requisição para está ação é :<br>
        <code class="higlighted">{{ route("api.iuguAPI.removerMetodoDePagamento", ["customer_id"=>"423434444", "payment_id"=>"242423424"]) }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Metódo removido com sucesso!",
        "data": {
            "id": "217F251B6DE8486E8794F5C18A8D5773",
            "description": "cartão de crédito",
            "item_type": "credit_card",
            "customer_id": "7231B330E03E413D8340F967E7D60653",
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
            <td>payment_id</td>
            <td>string</td>
            <td>(Obrigatório) ID do Método de Pagamento</td>
        </tr>
        </tbody>
    </table>
</div>
