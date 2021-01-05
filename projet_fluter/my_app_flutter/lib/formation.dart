import 'package:flutter/material.dart';
import './formation-detail.dart';
class Formation extends StatefulWidget{
  @override
  _FormationState createState() => _FormationState();
}

class _FormationState extends State<Formation>{


  String formation="";
  @override
  Widget build(BuildContext context){
    return Scaffold(
      appBar: AppBar(backgroundColor: Colors.cyan,title: Text(formation),),
      body: Column(
        children: <Widget>[
          Container(
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: TextField(
                decoration: InputDecoration(hintText: 'Taper le boutton Lister Les formation',),
                onChanged: (value){
                  setState(() {
                    this.formation=value;
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
                  Navigator.push(context, MaterialPageRoute(builder: (context)=>FormationDetail(formation)));
                },
                color:Colors.cyan,
                textColor: Colors.blue,
                child: Text('Lister Les Formations',style: TextStyle(fontSize: 22,color: Colors.white),),
                ),
            ))
        ]
      ),
      );
  }
}
