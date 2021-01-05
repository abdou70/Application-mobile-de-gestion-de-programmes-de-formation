import 'package:flutter/material.dart';
import './main-drawer.dart';
void main(){
  runApp(MaterialApp(home:MyApp(),));
}

class MyApp extends StatelessWidget{
    @override
    Widget build(BuildContext context){
      return Scaffold(
          drawer: MainDrawer(),
          appBar: AppBar(title: Text('CFP-GETECH'),backgroundColor: Colors.cyan,),
          body:Center(child: 
          Text('CFP-GETECH',style: TextStyle(fontSize: 22,color: Colors.cyan),)) 
      );
    }
}
