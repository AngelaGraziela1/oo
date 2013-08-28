<?php

$clienteFisica = new PessoaFisica();
$clienteFisica->setNome('Fulano');
$clienteFisica->setNascimento(new DateTime());
$clienteFisica->setCpf('8743927328');

$clienteJuridica = new PessoaJuridica();
$clienteJuridica->setNome('Fulano');
$clienteJuridica->setNascimento(new DateTime());
$clienteJuridica->getCnpj('123123123123123');

$atendente = new Funcionario();
$atendente->setNome('Funcionario 01');
$atendente->setNascimento(new DateTime());
$atendente->setCtps('04930420920');

$prod1 = new Produto();
$prod1->setDescricao('Coca Cola');
$prod1->setPreco(3.20);

$prod2 = new Produto();
$prod2->setDescricao('Pepsi');
$prod2->setPreco(3.10);

$prod3 = new Produto();
$prod3->setDescricao('Sanduiche');
$prod3->setPreco(2.00);

$venda = new Venda($atendente, $clienteFisica, new DateTime());

$items = array(
    new ItemVenda($prod1, 2),
    new ItemVenda($prod2, 3)
);

$venda->addItens($items);

$pagamentos = array(
    new Pagamento('Crédito', 10),
    new Pagamento('Dinehiro', 5)
);

$venda->finalizar($pagamentos);

$financeiro = new Financeiro();
$financeiro->faturar($venda);
