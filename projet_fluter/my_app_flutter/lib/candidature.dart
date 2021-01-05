import 'package:flutter/material.dart';
class Candidature extends StatelessWidget{
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(backgroundColor: Colors.cyan,),
      body: Center(
        child: Text('Candidature',style:TextStyle(fontSize: 22,color: Colors.cyan),),),
      );
  }
}