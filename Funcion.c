#define LARGO_CUIT 23

struct
{
    char cuit;
    int isEmpty;
}typedef Clientes;



int cliente_estadoCuit(Clientes list[],int listLen, char cuit[]){
    int retorno=0;

    for(int i =0; i<listLen; i++){  
        if(list[i].isEmpty==0){
            if(strncpm(list[i].cuit,cuit,LARGO_CUIT)==0){
                retorno=1;
                break;
            }
        }
    }
    return retorno;
}

int generarListaCli(Contrataciones listContr[], int contraLen,Clientes listCli[], int cliLen ){

    clienteInit(listCli,cliLen);
    int indexCli;

    for (int i = 0; i < contraLen; i++)
    {
        if(listContr[i].isEmpty==0)
        {
            if(cliente_estadoCuit(listCli,cliLen, listContr[i].cuit)==0){
                strncpy(listCli[indexCli].cuit,listContr[i].cuit,LARGO_CUIT);
                listCli[indexCli].isEmpty=0;
                indexCli++;
            }
        }
    }
    return i;
}

void informe(Contrataciones listContr[],int contraLen,Clientes listCli[],int cliLen){

    Clientes listaClientes[1000];
    generarListaCli(listContr, contraLen, listaClientes,1000);

    float importeMax;
    int iMax =0;

    importeMax = importeDeCliente(listaClientes[0].cuit);
    for (int i = 1; i < 1000; i++)
    {
        if (listaClientes[i].isEmpty==0)
        {
            if (importeDeCliente(listaClientes[i].cuit)>importeMax)
            {
                importeMax=importeDeCliente(listaClientes[i].cuit);
                int iMax=i;
            }
        }else{
            break;
        }
        
    }
    printf("cliente con importe max es : %s", listaClientes[iMax].cuit);
    

}

float importeDeCliente(char cuit[],Contrataciones listContr[],int contraLen, Display listDisplay[],int displayLen){
    
    float acc=0.0;

    for (int i = 0; i < contraLen; i++)
    {
        if (listContr[i].isEmpty==0)
        {
            if (strncmp(cuit,listContr[i].cuit,32))
            {
               float importe = listContr[i].cantidadDias * precioPorDia(listContr[i].);

               acc = acc + importe; 
            }
            
        }
        
    }
    return acc;
}

float precioPorDia(int idDisp, Display listDisplay[],int displayLen){
    int posicionEncontrada;

    if(findById(listDisplay,displayLen,idDisp,&posicionEncontrada)==1){
        return listDisplay[posicionEncontrada].pricePerday;
    }
    return 0;

}