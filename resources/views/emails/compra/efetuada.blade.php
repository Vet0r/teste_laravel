<x-mail::message>
    # Compra Efetuada com Sucesso!

    Olá, {{ $inscricao->usuario->name }}!

    Sua inscrição para o evento **{{ $inscricao->evento->titulo }}** foi realizada com sucesso.

    **Detalhes da compra:**
    - Data da inscrição: {{ \Carbon\Carbon::parse($inscricao->data_inscricao)->format('d/m/Y H:i') }}
    - Status: {{ $inscricao->status }}

    Agradecemos pela sua participação!

</x-mail::message>