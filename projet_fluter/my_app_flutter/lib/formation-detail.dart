import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
// import 'dart:async';
import 'dart:convert';

// ignore: must_be_immutable
class FormationDetail  extends StatefulWidget {

  String formations;
  FormationDetail(this.formations);
  @override
  _FormationDetailState createState() => _FormationDetailState();
}

class _FormationDetailState extends State<FormationDetail> {

  var formationData;

@override
  void initState() {
    super.initState();

    getData(widget.formations);
  }



getData(String formation){
  String url='http://192.168.1.27/samane_api_flutter/Formation/liste';

  http.get(url)
    .then((resp){
     setState(() {
        this.formationData=json.decode(resp.body);
        print(formationData);
     });

   }).catchError((err){

    print(err);

  });
}
  @override
  Widget build(BuildContext context) {
    return Scaffold(

      appBar: AppBar(title: Text('Formations ${widget.formations}'),
      backgroundColor: Colors.greenAccent,
      ),
      body:(formationData==null?Center(child: CircularProgressIndicator(),):

      ListView.builder(
        
        itemCount: (formationData==null?0:formationData["formations"].length),
        itemBuilder: (context,index){
          return Card(
            color: Colors.cyan,
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children:<Widget>[
                  CircleAvatar(
                    backgroundImage: AssetImage("images/gfp.png"),
                  ),
                    Text(formationData["formations"][index]["id"].toString(),style: TextStyle(fontSize: 22,color: Colors.white),),
                    Text(formationData["formations"][index]["nom"].toString(),style: TextStyle(fontSize: 22,color: Colors.white),)

                ],
              ),
            ),
          );
        }
        )
        


      )
    );
  }
}