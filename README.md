# Avaliação 01

Dado um conjunto de garrafas vazias, com volumes diferentes entre si, e um galão de água cheio.
Crie um algoritmo, onde o backend será em PHP ou Laravel, para escolher as garrafas a serem utilizadas para serem enchidas com o galão, de acordo:
- 1) O galão deve ser completamente esvaziado com o volume das garrafas;
- 2) Procure encher totalmente as garrafas escolhidas;
- 3) Quando não for possível encher todas garrafas escolhidas, deixe a menor sobra possível no galão;
- 4) utilize o menor número de garrafas possível;

## Exemplos

1:

```
Insira o volume do galão:
7
Quantidade de garrafas:
5
Garrafa 1:
1
Garrafa 2:
3
Garrafa 3:
4.5
Garrafa 4:
1.5
Garrafa 5:
3.5

Resposta: [1L, 4.5L, 1.5L], sobra 0L
```

2:

```
Insira o volume do galão:
5
Quantidade de garrafas:
4
Garrafa 1:
1
Garrafa 2:
3
Garrafa 3:
4.5
Garrafa 4:
1.5

Resposta: [4.5L], sobra 0.5L;
```

3:

```
Insira o volume do galão:
4.9
Garrafas:
2
Garrafa 1:
4.5
Garrafa 2:
0.4

Resposta: [4.5L, 0.4L], sobra 0L;
```

## Features
- Deverá ter uma tela de envio de informações do galão e das garrafas, que será composto por:
- 1) Um campo para inserir a quantidade de litros do galão;
- 2) Um campo para inserir um CSV, composto por quantidade de litros de cada garrafa;
- As informações do galão, das garrafas e do resultado deverão ser armazenados em um CSV e salvá-lo em uma pasta no backend para ser possível baixá-lo depois;
- Deverá ter uma tela de listagens de arquivos armazenados, e um botão de download em cada linha;
- Opcional: Na tela de listagem de arquivos armazenados, deverá ser possível enviar os arquivos por email;

