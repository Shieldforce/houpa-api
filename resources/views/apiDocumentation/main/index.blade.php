@extends("apiDocumentation.template.index")

@section("content")
    @includeIf("apiDocumentation.auth.login")
    @includeIf("apiDocumentation.auth.logout")
    @includeIf("apiDocumentation.auth.refresh")
    @includeIf("apiDocumentation.product.index")
@endsection
