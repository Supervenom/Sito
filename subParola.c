#include <stdio.h>
#include <string.h>

int subString (char frase[], char parola[])
{
    int lenf = strlen(frase);
    int lenp = strlen(parola);
    int verit=1;
    int i=0, j=0, contatore=0;
	if (lenf<lenp) return 0;
	for (i=0, j=0; i<lenf; i++,j++) {
		if (verit==1 && frase[i]!=parola[j] && frase[i]!=' ') {
    		verit = 0;
    	}
		if (frase[i]==' ') {
			if (verit==1) contatore++;
			j=-1;
			verit=1;
		}
    }
    if (verit==1) contatore++;
	return contatore;
}

int main ()
{
    char frase[] = "sono andato al sono supermercato sono";
    char parola[] = "sono";
	printf("%d\n", subString(frase, parola));
    return 0;
}
