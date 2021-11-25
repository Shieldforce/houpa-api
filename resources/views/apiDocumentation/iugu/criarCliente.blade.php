<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="criarCliente">Criar Cliente</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8081/api/iuguAPI/criarCliente',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'email'            => 'shieldforce2@gmail.com',
            'name'             => 'Alexandre Ferreira',
            'phone'            => '970185540',
            'phone_prefix'     => '021',
            'cpf_cnpj'         => '10142449784',
            'zip_code'         => '25065190',
            'number'           => '2',
            'street'           => 'rua 13 de maio',
            'city'             => 'duque de caxias',
            'state'            => 'rj',
            'district'         => 'vila são luis',
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
        <code class="higlighted">{{ route("api.iuguAPI.criarCliente") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Cliente criado com sucesso!",
        "data": {
            "id": "E9B262B31B7E49BC9AFAE5CA428CEDCE",
            "email": "shieldforce2@gmail.com",
            "name": "Alexandre Ferreira",
            "notes": null,
            "created_at": "2021-10-27T13:10:55-03:00",
            "updated_at": "2021-10-27T13:10:55-03:00",
            "cc_emails": null,
            "cpf_cnpj": "10142449784",
            "zip_code": "25065190",
            "number": "2",
            "complement": null,
            "phone": "970185540",
            "phone_prefix": "021",
            "default_payment_method_id": null,
            "proxy_payments_from_customer_id": null,
            "city": "Duque de Caxias",
            "state": "RJ",
            "district": "Vila São Luís",
            "street": "Rua Treze de Maio",
            "custom_variables": [],
            "payment_methods": []
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
            <td>email</td>
            <td>string</td>
            <td>(Obrigatório) Email do cliente</td>
        </tr>
        <tr>
            <td>name</td>
            <td>string</td>
            <td>(Obrigatório) Nome do cliente</td>
        </tr>
        <tr>
            <td>notes</td>
            <td>string</td>
            <td>(Opcional) Notas</td>
        </tr>
        <tr>
            <td>phone</td>
            <td>string</td>
            <td>(Opcional) Número do Telefone - 9 dígitos</td>
        </tr>
        <tr>
            <td>phone_prefix</td>
            <td>string</td>
            <td>(Opcional) Prefixo, apenas números - 3 dígitos (obrigatório caso preencha "phone")</td>
        </tr>
        <tr>
            <td>cpf_cnpj</td>
            <td>string</td>
            <td>(Opcional) CPF ou CNPJ do cliente. Obrigatório para emissão de boletos registrados. (apenas números)</td>
        </tr>
        <tr>
            <td>cc_emails</td>
            <td>string</td>
            <td>(Opcional) Endereços de E-mail para cópia separados por vírgula</td>
        </tr>
        <tr>
            <td>zip_code</td>
            <td>string</td>
            <td>(Opcional) CEP. Obrigatório para emissão de boletos registrados</td>
        </tr>
        <tr>
            <td>number</td>
            <td>string</td>
            <td>(Opcional) Número do endereço (obrigatório caso "zip_code" seja enviado).</td>
        </tr>
        <tr>
            <td>street</td>
            <td>string</td>
            <td>(Opcional) Rua. Obrigatório caso CEP seja incompleto.</td>
        </tr>
        <tr>
            <td>city</td>
            <td>string</td>
            <td>(Opcional) Cidade</td>
        </tr>
        <tr>
            <td>state</td>
            <td>string</td>
            <td>(Opcional) Estado</td>
        </tr>
        <tr>
            <td>district</td>
            <td>string</td>
            <td>(Opcional) Bairro. Obrigatório caso CEP seja incompleto.</td>
        </tr>
        <tr>
            <td>complement</td>
            <td>string</td>
            <td>(Opcional) Complemento de endereço. Ponto de referência.</td>
        </tr>
        <tr>
            <td>custom_variables</td>
            <td>array</td>
            <td>(Opcional) Array de campos customizados [['name'=>'nome_do_campo_1', 'value'=>'valor do campo 1'], ['name'=>'nome_do_campo_2', 'value'=>'valor do campo 2']]</td>
        </tr>
        </tbody>
    </table>
</div>
