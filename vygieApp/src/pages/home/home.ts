import { Component } from '@angular/core';
import { NavController, ActionSheetController } from 'ionic-angular';
import "rxjs/Rx";
import {Http} from "@angular/http";

@Component({
	selector: 'page-home',
	templateUrl: 'home.html'
})
export class HomePage {
	posts: any;
	uneIdEcole: number = 1;
	constructor(public navCtrl: NavController, public http: Http, public actionSheetCtrl: ActionSheetController) 
	{
  	     	this.http = http;
            this.navCtrl = navCtrl;
            this.http.get('http://localhost/vygieTest/api.php').map(res => res.json()).subscribe(data => {
                console.log(data);
                this.posts = data;
            });

	}	

	makePostRequest(uneEcole,uneMaladie) {
		 var unJSON = {
		 				unId:
		        		{
		        			idEcole:uneEcole,
		        			idMaladie:uneMaladie
		        		}
		       		};
        this.http.post("http://localhost/vygieTest/api.php",JSON.stringify(unJSON))
        .subscribe(data => {
           let actionSheet = this.actionSheetCtrl.create({
                title: "Data String",
                subTitle: data.json(),
                buttons: ["Sortir"]
            });
           actionSheet.present();
        }, error => {
            console.log(JSON.stringify(error.json()));
        });
    }
}
