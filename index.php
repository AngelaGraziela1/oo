<?php

//Carregamos o autoload das classes para o PHP
require 'vendor/autoload.php';

//Ativamos os erros no PHP
\Symfony\Component\Debug\Debug::enable();

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
$prod1->addEstoque(30);

$prod2 = new Produto();
$prod2->setDescricao('Pepsi');
$prod2->setPreco(3.10);
$prod2->addEstoque(20);

$prod3 = new Produto();
$prod3->setDescricao('Sanduiche');
$prod3->setPreco(2.00);
$prod3->addEstoque(50);

$venda = new Venda($atendente, $clienteFisica, new DateTime());

//Interessados na finalixação da venda
$estoqueManager = new \Estoque\Manager();
$venda->attach($estoqueManager);

$impressaoHtml = new \Impressora\Html();
$venda->attach($impressaoHtml);

$items = array(
    new ItemVenda($prod1, 2),
    new ItemVenda($prod2, 3)
);

$venda->addItens($items);

//TODO Criar enum para os tipos de pagamentos
$pagamentos = new \Easy\Collections\Collection(array(
    new Pagamento('Crédito', 10),
    new Pagamento('Dinheiro', 5)
));

$venda->finalizar($pagamentos);

$financeiro = new Financeiro();
$financeiro->faturar($venda);
