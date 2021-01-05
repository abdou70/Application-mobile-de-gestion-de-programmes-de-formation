import 'package:flutter/material.dart';
import './departement-detail.dart';
class Departements extends StatefulWidget{
  @override
  _DepartementsState createState() => _DepartementsState();
}
class _DepartementsState extends State<Departements>{
  
  String departement="";
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(backgroundColor: Colors.cyan,title: Text(departement),),
      body: Column(
        children: <Widget>[
          Container(
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: TextField(
                decoration: InputDecoration(hintText: 'Taper le boutton Lister Les departements',),
                onChanged: (value){
                  setState(() {
                    this.departement=value;
                  });

                },
              ),
            ),
          ),
          Container(
            width: double.infinity,
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: RaisedButton(
                onPressed: (){
                  Navigator.push(context, MaterialPageRoute(builder: (context)=>DepartementDetail(departement)));
                },
                color:Colors.cyan,
                textColor: Colors.blue,
                child: Text('Lister Les Departements',style: TextStyle(fontSize: 22,color: Colors.white),),
                ),
            ))
        ]
      ),
      );
  }
}
