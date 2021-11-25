<div class="overflow-hidden content-section" id="content-get-characters">
    <h2 id="criarAssinatura">Criar Assinatura</h2>
    <pre>
    <code class="bash">
    # Exemplo de Requisição em PHP
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8081/api/iuguAPI/criarAssinatura',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'customer_id'      => '{customer_id}',
            'plan_identifier'  => 'plano_basico',
            'description'      => 'seguro carro',
            'price_cents'      => '12500 (valor mínimo 100, que significa 1,00 Real)',
            'quantity'         => 1,
            'recurrent'        => true,
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
        <code class="higlighted">{{ route("api.iuguAPI.criarAssinatura") }}</code>
    </p>
    <br>
    <pre>
    <code class="json">
    Resultado Esperado :
    {
        "code": 50000,
        "status": "success",
        "message": "Assinatura criada com sucesso!",
        "data": {
            "id": "F74AEED8EFA3497FBFEFD7D324C22947",
            "suspended": false,
            "plan_identifier": "plano_basico",
            "price_cents": 12500,
            "currency": "BRL",
            "features": [],
            "expires_at": "2021-11-29",
            "created_at": "2021-10-29T14:35:26-03:00",
            "updated_at": "2021-10-29T14:35:32-03:00",
            "customer_name": "Alexandre Ferreira",
            "customer_email": "shieldforce4@gmail.com",
            "cycled_at": "2021-10-29",
            "credits_min": 0,
            "credits_cycle": null,
            "payable_with": "credit_card",
            "ignore_due_email": true,
            "max_cycles": 12,
            "cycles_count": 0,
            "customer_id": "9709E5D24AC44DFF9EA9E326E8637EAF",
            "plan_name": "Plano Básico",
            "customer_ref": "Alexandre Ferreira",
            "plan_ref": "Plano Básico",
            "active": true,
            "two_step": false,
            "suspend_on_invoice_expired": true,
            "in_trial": null,
            "credits": 0,
            "credits_based": false,
            "recent_invoices": [
                {
                    "id": "102BC3FA56874D9CAD7F8AA93FB7D994",
                    "due_date": "2021-10-29",
                    "status": "paid",
                    "total": "R$ 250,00",
                    "secure_url": "https://faturas.iugu.com/102bc3fa-5687-4d9c-ad7f-8aa93fb7d994-db76"
                }
            ],
            "subitems": [
                {
                    "id": "8F75BA3FC35144A2A0B01FABB9FF98A5",
                    "description": "seguro auto",
                    "quantity": 1,
                    "price_cents": 12500,
                    "recurrent": true,
                    "price": "R$ 125,00",
                    "total": "R$ 125,00"
                }
            ],
            "logs": [
                {
                    "id": "053B5B7BAFB24F57A7C2C749F89C02DD",
                    "description": "Fatura criada",
                    "notes": "Fatura criada com os items:  1x seguro auto = R$ 125,00;1x Ativação de Assinatura: Plano Básico = R$ 125,00;",
                    "subscription_changes": "{\"plan_identifier\":[null,\"plano_basico\"],\"customer_id\":[null,\"9709E5D24AC44DFF9EA9E326E8637EAF\"],\"ignore_due_email\":[null,true],\"payable_with\":[null,\"credit_card\"],\"two_step\":[true,false],\"price_cents\":[0,12500],\"interval\":[null,1],\"interval_type\":[null,\"months\"],\"max_cycles\":[0,12],\"id\":[null,\"F74AEED8EFA3497FBFEFD7D324C22947\"],\"created_at\":[null,\"2021-10-29T14:35:26-03:00\"],\"updated_at\":[null,\"2021-10-29T14:35:26-03:00\"]}",
                    "created_at": "2021-10-29T14:35:28-03:00"
                },
                {
                    "id": "087F1CC29F91406D8DE5128607934E3D",
                    "description": "Assinatura Criada",
                    "notes": "Assinatura Criada ",
                    "subscription_changes": "{\"plan_identifier\":[null,\"plano_basico\"],\"customer_id\":[null,\"9709E5D24AC44DFF9EA9E326E8637EAF\"],\"ignore_due_email\":[null,true],\"payable_with\":[null,\"credit_card\"],\"two_step\":[true,false],\"price_cents\":[0,12500],\"interval\":[null,1],\"interval_type\":[null,\"months\"],\"max_cycles\":[0,12],\"id\":[null,\"F74AEED8EFA3497FBFEFD7D324C22947\"],\"created_at\":[null,\"2021-10-29T14:35:26-03:00\"],\"updated_at\":[null,\"2021-10-29T14:35:26-03:00\"]}",
                    "created_at": "2021-10-29T14:35:26-03:00"
                }
            ],
            "custom_variables": []
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
            <td>plan_identifier</td>
            <td>string</td>
            <td>(Obrigatório) Identificador do Plano. Só é enviado para assinaturas que não são credits_based</td>
        </tr>
        <tr>
            <td>description</td>
            <td>string</td>
            <td>(Obrigatório) Descrição do Item</td>
        </tr>
        <tr>
            <td>price_cents</td>
            <td>integer</td>
            <td>(Obrigatório) Preço em Centavos. Valores negativos entram como desconto no total das Faturas criadas pela Assinatura. "price_cents" valor mínimo 100.</td>
        </tr>
        <tr>
            <td>quantity</td>
            <td>string</td>
            <td>(Obrigatório) Quantidade</td>
        </tr>
        <tr>
            <td>recurrent</td>
            <td>boolean</td>
            <td>(Obrigatório) Item recorrente? booleano - Sempre true</td>
        </tr>
        </tbody>
    </table>
</div>
