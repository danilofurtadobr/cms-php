<?php
// Inclusão do framework PHPUnit
use PHPUnit\Framework\TestCase;

class VetorTest extends TestCase
{
    public function testAdicionarERemover()
    {
        // Inicializa o vetor vazio
        $vetor = [];
        // Testa se as duas variáveis tem o mesmo tipo e valor
        //                0, quantas posições tem o vetor
        $this->assertSame(0, count($vetor));
        // Adiciona o valor foo no vetor
        array_push($vetor, 'foo');
        // Testa se a posição 0 do vetor contém a string foo
        $this->assertSame('foo', $vetor[count($vetor)-1]);
        // Testa se as duas variáveis tem o mesmo tipo e valor
        //                1, quantas posições tem o vetor
        $this->assertSame(1, count($vetor));
        // Testa se as duas variáveis tem o mesmo tipo e valor
        //                 foo,  Retira o último valor do vetor
        $this->assertSame('foo', array_pop($vetor));
        // Testa se as duas variáveis tem o mesmo tipo e valor
        //                0, quantas posições tem o vetor
        $this->assertSame(0, count($vetor));
    }
}