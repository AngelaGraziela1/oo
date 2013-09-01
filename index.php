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
$clienteJuridica->setNome('Fulano Juridico');
$clienteJuridica->setNascimento(new DateTime());
$clienteJuridica->getCnpj('123123123123123');

$atendente = new Funcionario();
$atendente->setNome('Funcionario 01');
$atendente->setNascimento(new DateTime());
$atendente->setCtps('04930420920');

//VENDA 1
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
$venda->setId(1);

//Interessados em eventos da venda
$estoqueManager = new \Estoque\BaixarEstoque();
$venda->attach($estoqueManager, \Event\Events::ON_ADD_ITEM);

$impressaoHtml = new \Venda\Impressora\Html();
$venda->attach($impressaoHtml,  \Event\Events::ON_VENDA_FINALIZADA);

$estoquePrinter = new \Estoque\Impressora\ImprimirEstoque();
$venda->attach($estoquePrinter,  \Event\Events::ON_VENDA_FINALIZADA);

$baixarEstoque = new \Estoque\AumentarEstoque();
$venda->attach($baixarEstoque, \Event\Events::ON_REMOVER_ITEM);

$item1 = new ItemVenda($prod2, 2);
$item2 = new ItemVenda($prod1, 2);
$item3 = new ItemVenda($prod3, 2);

$venda->addItem($item1);
$venda->addItem($item2);
$venda->addItem($item3);

$venda->removerItem($item1);
$venda->removerItem($item2, 1);

$pagamentos = new \Easy\Collections\Collection(array(
    new Pagamento(FormaPagamento::CARTAO_CREDITO, 10),
    new Pagamento(FormaPagamento::DINHEIRO, 5)
));

$venda->finalizar($pagamentos);

$financeiro = Financeiro::getInstance();

$htmlPrinter = new \Financeiro\Impressora\Html();
$financeiro->attach($htmlPrinter, \Event\Events::ON_FATURAR_VENDA);

$financeiro->faturar($venda);


//VENDA 2
$prod4 = new Produto();
$prod4->setDescricao('Carro');
$prod4->setPreco(300);
$prod4->addEstoque(30);

$prod5 = new Produto();
$prod5->setDescricao('Apto');
$prod5->setPreco(3989);
$prod5->addEstoque(20);

$prod6 = new Produto();
$prod6->setDescricao('Aviao');
$prod6->setPreco(1200);
$prod6->addEstoque(50);

$venda2 = new Venda($atendente, $clienteJuridica, new DateTime());
$venda2->setId(2);

//Interessados em eventos da venda
$estoqueManager = new \Estoque\BaixarEstoque();
$venda2->attach($estoqueManager, \Event\Events::ON_ADD_ITEM);

$impressaoHtml = new \Venda\Impressora\Html();
$venda2->attach($impressaoHtml,  \Event\Events::ON_VENDA_FINALIZADA);

$estoquePrinter = new \Estoque\Impressora\ImprimirEstoque();
$venda2->attach($estoquePrinter,  \Event\Events::ON_VENDA_FINALIZADA);

$baixarEstoque = new \Estoque\AumentarEstoque();
$venda2->attach($baixarEstoque, \Event\Events::ON_REMOVER_ITEM);

$item1 = new ItemVenda($prod4, 2);
$item2 = new ItemVenda($prod5, 2);
$item3 = new ItemVenda($prod6, 2);

$venda2->addItem($item1);
$venda2->addItem($item2);
$venda2->addItem($item3);

$venda2->removerItem($item1);
$venda2->removerItem($item2, 1);

$pagamentos = new \Easy\Collections\Collection(array(
    new Pagamento(FormaPagamento::CARTAO_CREDITO, 10),
    new Pagamento(FormaPagamento::DINHEIRO, 5)
));

$venda2->finalizar($pagamentos);

$financeiro1 = Financeiro::getInstance();
$financeiro1->faturar($venda2);

/*$bd = \Singleton\DB::getInstance();
$bd1 = \Singleton\DB::getInstance();

\Easy\Utility\Debugger::dump($bd);
\Easy\Utility\Debugger::dump($bd1);*/