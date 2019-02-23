<?php

define("DSN","mysql");
define("SERVIDOR","localhost");
define("USUARIO","root");
define("SENHA","");
define("BANCODEDADOS","trabalho");

function conectar(){
    try{
        $conn = new PDO (DSN.':host='.SERVIDOR.';dbname='.BANCODEDADOS,USUARIO,SENHA);
        return $conn;
    } catch (PDOException $e) {
        echo ''.$e->getMessage();
    }

}

/////////////////////////////////////////////////estado/////////////////////////////////////

function listarEstados() {
    $conn = conectar();
    
    $stmt=$conn ->prepare ("select id, nome from estado order by nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }


////////////////////////////////////////////////login//////////////////////////////////////////////////

function validarLogin($login,$senha){
    $conn = conectar();
    $stmt=$conn->prepare("select c.id, c.cod from cliente as c  where login= :login and senha= :senha UNION select m.id, m.cod from master as m  where login= :login and senha= :senha  ");
    $stmt->bindParam(':login',$login);
    $stmt->bindParam(':senha',$senha);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


//////////////////////////////////////////////////cliente/////////////////////////////////////////////////

function salvarCliente($cliente){
    $conn = conectar();
    $stmt = $conn->prepare ('INSERT INTO cliente(nome,estado_id,email,cpf,rg,idade,endereco,cidade,cep,login,senha, cod) 
    VALUE(:nome,:estado_id,:email,:cpf,:rg,:idade,:endereco,:cidade,:cep,:login,:senha,"1")');
    $stmt->bindParam(':nome',$cliente['nome']);
    $stmt->bindParam(':estado_id',$cliente['estado_id']); 
    $stmt->bindParam(':email',$cliente['email']);
    $stmt->bindParam(':cpf',$cliente['cpf']); 
    $stmt->bindParam(':rg',$cliente['rg']); 
    $stmt->bindParam(':idade',$cliente['idade']); 
    $stmt->bindParam(':endereco',$cliente['endereco']); 
    $stmt->bindParam(':cidade',$cliente['cidade']); 
    $stmt->bindParam(':cep',$cliente['cep']);
    $stmt->bindParam(':login',$cliente['login']); 
    $stmt->bindParam(':senha',$cliente['senha']); 
    if($stmt->execute()){
        return "Cliente inserido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }
}

function listarClientes() {
    $conn = conectar();
    
    $stmt=$conn ->prepare ("select c.id, c.nome as nome, c.email, c.cpf, c.rg , c.idade, c.endereco, c.cidade, e.nome as estado_id,  c.cep, c.login, c.senha from cliente as c  inner join estado as e on c.estado_id = e.id order by c.nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }

function buscarCliente($id){
    $conn = conectar();
    $stmt=$conn->prepare("select id, nome, estado_id, email, cpf, rg , idade, endereco, cidade , cep, login, senha from cliente where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

function editarCliente($cliente){
    $conn = conectar();
    $stmt = $conn->prepare ('update cliente set nome=:nome,estado_id=:estado_id,email=:email,cpf=:cpf,rg=:rg,idade=:idade,endereco=:endereco,cidade=:cidade,cep=:cep, login=:login, senha=:senha where id=:id') ;
    $stmt->bindParam(':nome',$cliente['nome']);
    $stmt->bindParam(':estado_id',$cliente['estado_id']); 
    $stmt->bindParam(':email',$cliente['email']);
    $stmt->bindParam(':cpf',$cliente['cpf']); 
    $stmt->bindParam(':rg',$cliente['rg']); 
    $stmt->bindParam(':idade',$cliente['idade']); 
    $stmt->bindParam(':endereco',$cliente['endereco']); 
    $stmt->bindParam(':cidade',$cliente['cidade']); 
    $stmt->bindParam(':cep',$cliente['cep']);  
    $stmt->bindParam(':id',$cliente['id']); 
    $stmt->bindParam(':login',$cliente['login']); 
    $stmt->bindParam(':senha',$cliente['senha']); 
    if($stmt->execute()){
        return "Cliente alterado com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "erro!";
    }
}

function excluirCliente($id){
    $conn = conectar();
    $stmt = $conn->prepare ('delete from cliente where id=:id');
    $stmt->bindParam(':id',$id); 
    if($stmt->execute()){
        return "Cliente excluido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }

}



////////////////////////////////////////////////////vendedor///////////////////////////////////////////////


function salvarVendedor($vendedor){
    $conn = conectar();
    $stmt = $conn->prepare ('INSERT INTO vendedor(nome,email,cpf,rg,idade,endereco,cidade,estado_id,cep) 
    VALUE(:nome,:email,:cpf,:rg,:idade,:endereco,:cidade,:estado_id,:cep)');
    $stmt->bindParam(':nome',$vendedor['nome']);
    $stmt->bindParam(':email',$vendedor['email']);
    $stmt->bindParam(':cpf',$vendedor['cpf']); 
    $stmt->bindParam(':rg',$vendedor['rg']); 
    $stmt->bindParam(':idade',$vendedor['idade']); 
    $stmt->bindParam(':endereco',$vendedor['endereco']); 
    $stmt->bindParam(':cidade',$vendedor['cidade']); 
    $stmt->bindParam(':estado_id',$vendedor['estado_id']); 
    $stmt->bindParam(':cep',$vendedor['cep']); 
    if($stmt->execute()){
        return "Cliente inserido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }
}

function listarVendedores() {
    $conn = conectar();
                     
    $stmt=$conn ->prepare ("select v.id, v.nome as nome, v.email, v.cpf, v.rg , v.idade, v.endereco, v.cidade, e.nome as estado_id, v.cep from vendedor as v inner join estado as e on v.estado_id = e.id order by v.nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }

function buscarVendedor($id){
    $conn = conectar();
    $stmt=$conn->prepare("select id, nome, email, cpf, rg , idade, endereco, cidade, estado_id, cep from vendedor where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

function editarVendedor($vendedor){
    $conn = conectar();
    $stmt = $conn->prepare ('update vendedor set nome=:nome,email=:email,cpf=:cpf,rg=:rg,idade=:idade,endereco=:endereco,cidade=:cidade,estado_id=:estado_id,cep=:cep where id=:id') ;
    $stmt->bindParam(':nome',$vendedor['nome']);
    $stmt->bindParam(':email',$vendedor['email']);
    $stmt->bindParam(':cpf',$vendedor['cpf']); 
    $stmt->bindParam(':rg',$vendedor['rg']); 
    $stmt->bindParam(':idade',$vendedor['idade']); 
    $stmt->bindParam(':endereco',$vendedor['endereco']); 
    $stmt->bindParam(':cidade',$vendedor['cidade']); 
    $stmt->bindParam(':estado_id',$vendedor['estado_id']); 
    $stmt->bindParam(':cep',$vendedor['cep']);  
    $stmt->bindParam(':id',$vendedor['id']); 
    if($stmt->execute()){
        return "Cliente alterado com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "erro!";
    }
}

function excluirVendedor($id){
    $conn = conectar();
    $stmt = $conn->prepare ('delete from vendedor where id=:id');
    $stmt->bindParam(':id',$id); 
    if($stmt->execute()){
        return "Cliente excluido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }

}



/////////////////////////////////////////////////////medicos/////////////////////////////////////////////////


function salvarMedico($medico){
    $conn = conectar();
    $stmt = $conn->prepare ('INSERT INTO medico(nome,email,cpf,rg,idade,crm,especialidade,endereco,cidade,estado_id,cep) 
    VALUE(:nome,:email,:cpf,:rg,:idade,:crm,:especialidade,:endereco,:cidade,:estado_id,:cep)');
    $stmt->bindParam(':nome',$medico['nome']);
    $stmt->bindParam(':email',$medico['email']);
    $stmt->bindParam(':cpf',$medico['cpf']); 
    $stmt->bindParam(':rg',$medico['rg']); 
    $stmt->bindParam(':idade',$medico['idade']);
    $stmt->bindParam(':crm',$medico['crm']); 
    $stmt->bindParam(':especialidade',$medico['especialidade']);  
    $stmt->bindParam(':endereco',$medico['endereco']); 
    $stmt->bindParam(':cidade',$medico['cidade']); 
    $stmt->bindParam(':estado_id',$medico['estado_id']); 
    $stmt->bindParam(':cep',$medico['cep']); 
    if($stmt->execute()){
        return "Cliente inserido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }
}

function listarMedicos() {
    $conn = conectar();

    $stmt=$conn ->prepare ("select m.id, m.nome as nome, m.email, m.cpf, m.rg , m.idade, m.crm, m.especialidade, m.endereco, m.cidade, e.nome as estado_id, m.cep from medico as m inner join estado as e on m.estado_id = e.id order by m.nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }

function buscarMedico($id){
    $conn = conectar();
    $stmt=$conn->prepare("select id, nome, email, cpf, rg , idade, crm, especialidade, endereco, cidade, estado_id, cep from medico where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

function editarMedico($medico){
    $conn = conectar();
    $stmt = $conn->prepare ('update medico set nome=:nome,email=:email,cpf=:cpf,rg=:rg,idade=:idade,crm=:crm,especialidade=:especialidade,endereco=:endereco,cidade=:cidade,estado_id=:estado_id,cep=:cep where id=:id') ;
    $stmt->bindParam(':nome',$medico['nome']);
    $stmt->bindParam(':email',$medico['email']);
    $stmt->bindParam(':cpf',$medico['cpf']); 
    $stmt->bindParam(':rg',$medico['rg']); 
    $stmt->bindParam(':idade',$medico['idade']); 
    $stmt->bindParam(':crm',$medico['crm']); 
    $stmt->bindParam(':especialidade',$medico['especialidade']); 
    $stmt->bindParam(':endereco',$medico['endereco']); 
    $stmt->bindParam(':cidade',$medico['cidade']); 
    $stmt->bindParam(':estado_id',$medico['estado_id']); 
    $stmt->bindParam(':cep',$medico['cep']);  
    $stmt->bindParam(':id',$medico['id']); 
    if($stmt->execute()){
        return "Cliente alterado com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "erro!";
    }
}

function excluirMedico($id){
    $conn = conectar();
    $stmt = $conn->prepare ('delete from medico where id=:id');
    $stmt->bindParam(':id',$id); 
    if($stmt->execute()){
        return "Cliente excluido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }
}

/////////////////////////////////////////////////////medicamento///////////////////////////////////////////


function salvarMedicamento($medicamento){
    $conn = conectar();
    $stmt = $conn->prepare ('INSERT INTO medicamento(nome,lote,dtFabricacao,dtValidade,valor,imagem,bula) 
    VALUE(:nome,:lote,:dtFabricacao,:dtValidade,:valor,:imagem,:bula)');
    $stmt->bindParam(':nome',$medicamento['nome']);
    $stmt->bindParam(':lote',$medicamento['lote']);
    $stmt->bindParam(':dtFabricacao',$medicamento['dtFabricacao']); 
    $stmt->bindParam(':dtValidade',$medicamento['dtValidade']); 
    $stmt->bindParam(':valor',$medicamento['valor']);
    $stmt->bindParam(':bula',$medicamento['bula']);  
    $stmt->bindParam(':imagem',$medicamento['imagem']); 
    if($stmt->execute()){
        return "Cliente inserido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }
}

function listarMedicamentos() {
    $conn = conectar();
    
    $stmt=$conn ->prepare ("select id, nome,lote,dtFabricacao,dtValidade,valor,imagem from medicamento order by nome");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }

function buscarMedicamento($id){
    $conn = conectar();
    $stmt=$conn->prepare("select id, nome,lote,dtFabricacao,dtValidade,valor,imagem, bula from medicamento where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

function editarMedicamento($medicamento){
    $conn = conectar();
    $stmt = $conn->prepare ('update medicamento set nome=:nome,lote=:lote,dtFabricacao=:dtFabricacao,dtValidade=:dtValidade,valor=:valor,imagem=:imagem,bula=:bula where id=:id') ;
    $stmt->bindParam(':nome',$medicamento['nome']);
    $stmt->bindParam(':lote',$medicamento['lote']);
    $stmt->bindParam(':dtFabricacao',$medicamento['dtFabricacao']); 
    $stmt->bindParam(':dtValidade',$medicamento['dtValidade']); 
    $stmt->bindParam(':valor',$medicamento['valor']); 
    $stmt->bindParam(':bula',$medicamento['bula']); 
    $stmt->bindParam(':imagem',$medicamento['imagem']); 
    $stmt->bindParam(':id',$medicamento['id']); 
    if($stmt->execute()){
        return "Cliente alterado com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "erro!";
    }
}

function excluirMedicamento($id){
    $conn = conectar();
    $stmt = $conn->prepare ('delete from medicamento where id=:id');
    $stmt->bindParam(':id',$id); 
    if($stmt->execute()){
        return "Cliente excluido com sucesso!";
    }else{
        print_r($stmt->errorInfo());
        return "Erro!";
    }

}

///////////////////////////////////////////////////////master///////////////////////////////////////////

function buscarMaster($id){
    $conn = conectar();
    $stmt=$conn->prepare("select id, login, senha from master where id= :id");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

///////////////////////////////////////////////excluir carrinho//////////////////////////



function excluirCarrinho($id){
    foreach ($_SESSION['carrinho'] as $indice => $carrinhoRemover) {
        if ($id == $carrinhoRemover['id']){
            unset ($_SESSION ['carrinho'][$indice]);
        }
    }

}


////////////////////////////////////////////////////////salvar pedido////////////////////////////////////

function salvarPedido ($cliente, $carrinho){
    $conn = conectar();
    $conn->beginTransaction();
    $soma =0;
    foreach($carrinho as $produto){
        $soma = ($soma + $produto['valor']);
    }
    $stmt=$conn->prepare("insert into pedido( cliente_id, valor_total, dt_compra) values (:cliente_id, :valor_total,now())");
    $stmt->bindParam(':cliente_id',$cliente['id']); 
    $stmt->bindParam(':valor_total',$soma);
    $stmt->execute();
    $id_pedido = $conn-> lastInsertId();

    foreach($carrinho as $produto){
        $stmt=$conn->prepare("insert into itens( pedido_id, medicamento_id, quantidade, valor_produto) values (:pedido_id, :medicamento_id, 1, :valor_produto)");
        $stmt->bindParam(':medicamento_id',$produto['id']); 
        $stmt->bindParam(':pedido_id',$id_pedido); 
        $stmt->bindParam(':valor_produto',$produto['valor']); 
        $stmt->execute();
    }
    $conn ->commit();

}

function listarCompras() {
    $conn = conectar();

    $stmt=$conn ->prepare ("select p.id, c.nome as nomeitem ,m.nome as nomemedic, m.valor, p.dt_compra ,p.valor_total
    from pedido as p
    left join cliente as c
    on c.id = p.cliente_id
    left join itens as i
    on i.pedido_id = p.id
    left join medicamento as m
    on m.id = medicamento_id
    order by  p.id");
    if(!$stmt->execute()){
        
        print_r($stmt->errorInfo());
        
    }
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($retorno);
    return $retorno;
    }

?> 

