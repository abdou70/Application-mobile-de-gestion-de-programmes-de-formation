import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

// ignore: must_be_immutable
class DepartementDetail  extends StatefulWidget {

  
  String departements;
  DepartementDetail(this.departements);
  @override
  _DepartementDetailState createState() => _DepartementDetailState();
}

class _DepartementDetailState extends State<DepartementDetail> {

  var departementData;

@override
  void initState() {
    super.initState();

    getData(widget.departements);
  }



getData(String departement){
  String url='http://192.168.1.27/samane_api_flutter/Departement/liste';

  http.get(url)
    .then((resp){
     setState(() {

         this.departementData=json.decode(resp.body);
         print(departementData);
      });
     

    }).catchError((erroor){

    print(erroor);

  });
}
  @override
  Widget build(BuildContext context) {
    return Scaffold(

      appBar: AppBar(title: Text('Departements ${widget.departements}'),
      backgroundColor: Colors.greenAccent,
      ),
      body:(departementData==null?Center(child: CircularProgressIndicator(),):

      ListView.builder(
        
        itemCount: (departementData==null?0:departementData['departements'].length),
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
                    Text(departementData['departements'][index]['id'].toString(),style: TextStyle(fontSize: 22,color: Colors.white),),
                    Text(departementData['departements'][index]['nom'].toString(),style: TextStyle(fontSize: 22,color: Colors.white),),

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