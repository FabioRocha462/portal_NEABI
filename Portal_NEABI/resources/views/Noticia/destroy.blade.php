<form action="{{route('noticia.destroy',$n['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <button class="btn btn-danger"  type="reset" value='salvar'>DELETAR</button>
</form>    