import { Component } from '@angular/core';
import { NavController, AlertController } from 'ionic-angular';
import "rxjs/Rx";
import {Http} from "@angular/http";
import { Storage } from '@ionic/storage';
@Component({
	selector: 'page-home',
	templateUrl: 'home.html'
})
export class HomePage {
	posts: any;
    affichages: any;
    titre: any;
	uneIdEcole: number = 1;
    id: string;
    UneEcole: string;
	constructor(public navCtrl: NavController, public http: Http, public alertCtrl: AlertController, public storage: Storage) 
	{
        this.http = http;
        this.navCtrl = navCtrl;
        this.storage = new Storage(storage);
        //on vérifi si une id ecole et stocker en local 
        this.storage.get('id').then((val)=>{
                                        if(val == null)
                                        {
                                            //on crée la list pour que l'utilisateur puisse choisir l'ecole
                                            document.getElementById("choisiTonEcole").style.display = "block";
                                            this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=ecole').map(res => res.json()).subscribe(data => {
                                                this.posts = data;
                                            });
                                        }
                                        else
                                        {
                                            //si il a une id de stoker alors on affiche les maladi le nom de l'ecole et le nombre de malad par maladi dans l'ecole selectionner
                                            this.id = val ;
                                            console.log(val);
                                            this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=malade').map(res => res.json()).subscribe(data => {
                                                this.posts = data;
                                            });
                                            this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=total&unId='+val+'').map(res => res.json()).subscribe(data => {
                                                this.affichages = data;
                                            });
                                            this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=nomEcole&unId='+val+'').map(res => res.json()).subscribe(data => {
                                                this.titre=data[0].nom_Ecole;
                                            });
                                        }
                                });
	}
    //la fonction qui ajoute l'id de lecole selectioner a l'accueil et la stock dans une variable en local 	
    ontest()
    {
        if((<HTMLInputElement>document.getElementById('choisiUneEcole')).value == "0")
        {  
            let alert = this.alertCtrl.create({
                title: "Attention",
                subTitle: "sélectionner une ville SVP",
                buttons: ["Sortir"]
            });
           alert.present();  
        }
        else
        {
            let unSelect = (<HTMLInputElement>document.getElementById('choisiUneEcole'));
            // let indexSelect = (<HTMLSelectElement>document.getElementById('choisiUneEcole')).selectedIndex;
            this.storage.set('id',unSelect.value);
            // console.log(unSelect[indexSelect].text);
            window.location.reload();
        }
    }
    // suprime la variable local et rafrechi la page 
    renit()
    {
        this.storage.clear();
        window.location.reload();
    }
    // Ajoute un malad a la bdd en fonction de la maladi selectioner et rafrechie l'affichage
	makePostRequest(uneEcole,uneMaladie) 
    {
        //je passe dans une methode post donc j'encode en json pour l'envoi dans l'api  
        let unJSON = {
                        unId:
                        {
                            idEcole:uneEcole,
                            idMaladie:uneMaladie
                        }
                    };
        this.http.post("http://theveniaux.chalon.codeur.online/apiVygie/api.php",JSON.stringify(unJSON))
        .subscribe(data => {
             this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=total&unId='+uneEcole+'').map(res => res.json()).subscribe(data => {
                                                                        this.affichages = data;
                                                                        }); 
        }, error => {
            console.log(JSON.stringify(error.json()));
        });                
    }
    suprime(id,idMaladie,idMalade)
    {
        if(idMalade == 0)
        {

        }
        else
        {
            this.http.get('http://theveniaux.chalon.codeur.online/apiVygie/api.php?verif=sup&unId='+id+'&idM='+idMaladie+'&idI='+idMalade+'').map(res => res.json()).subscribe(data => {
                                                                        this.affichages = data;
                                                                        });
        }
    }
}
