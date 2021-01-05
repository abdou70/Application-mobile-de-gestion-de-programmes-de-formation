import 'package:flutter/material.dart';
import 'departement.dart';
import 'candidature.dart';
import 'connexion.dart';
import 'formation.dart';
class MainDrawer extends StatelessWidget{
  @override
  Widget build(BuildContext context){
    return Drawer(
            child:ListView(
              children:<Widget>[
                 DrawerHeader(
                   decoration: BoxDecoration(
                     gradient: LinearGradient(colors: [Colors.greenAccent,Colors.deepOrange])
                   ),
                   child:Center(
                     child:
                     CircleAvatar(
                     radius: 40,
                     backgroundImage: AssetImage('images/gfp.png'),
                     ),
                     ),
                 ),
                 ListTile(
                   title:Text('Departements',style:TextStyle(fontSize: 20,color: Colors.cyan), ),
                   onTap:(){
                     Navigator.of(context).pop();
                     Navigator.push(context, MaterialPageRoute(builder: (context)=>Departements()));
  
                   },
                 ),
                 Divider(color: Colors.cyan,),
                 ListTile(
                   title:Text('Formations',style: TextStyle(fontSize: 20,color: Colors.cyan),),
                   onTap:(){
                     Navigator.of(context).pop();
                     Navigator.push(context, MaterialPageRoute(builder: (context)=>Formation()));
                   },
                 ),
                 Divider(color: Colors.cyan,),
                 ListTile(
                   title:Text('Candidater',style: TextStyle(fontSize: 20,color: Colors.cyan),),
                   onTap:(){
                    Navigator.of(context).pop();
                     Navigator.push(context, MaterialPageRoute(builder: (context)=>Candidature()));
                   },
                 ),
                 Divider(color: Colors.cyan,),
                 ListTile(
                   title:Text('Se Connecter',style: TextStyle(fontSize: 20,color: Colors.cyan),),
                   onTap:(){
                    Navigator.of(context).pop();
                     Navigator.push(context, MaterialPageRoute(builder: (context)=>Connexion()));
                   },
                 ),
              ],
            ),
          );
  }
}