import 'package:flutter/material.dart';
class Connexion extends StatelessWidget{
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(backgroundColor: Colors.cyan,),
      body: Center(
        child: Text('Connexion',style:TextStyle(fontSize: 22,color: Colors.cyan),),),
      );
  }
}