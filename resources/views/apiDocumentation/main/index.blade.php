@extends("apiDocumentation.template.index")

@section("content")
    @includeIf("apiDocumentation.auth.login")
    @includeIf("apiDocumentation.auth.logout")
    @includeIf("apiDocumentation.auth.refresh")
    @includeIf("apiDocumentation.product.index")
    @includeIf("apiDocumentation.product.show")
    @includeIf("apiDocumentation.product.create")
    @includeIf("apiDocumentation.product.edit")
    @includeIf("apiDocumentation.product.delete")
@endsection
