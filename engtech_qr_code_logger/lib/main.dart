import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_barcode_scanner/flutter_barcode_scanner.dart';
import 'package:flutter_speed_dial/flutter_speed_dial.dart';
import 'dart:convert';
import 'dart:io' as Io;

String serverURL = 'https://a4133d48682c.ngrok.io';
String getUserURL = serverURL + '/engtechqr/web_server/web_api/getIndividual';
String getEstablishmentURL = serverURL + '/engtechqr/web_server/web_api/getEstablishment';
String logUserURL = serverURL + '/engtechqr/web_server/web_api/qrLog';
String imageURL = serverURL + '/engtechqr/web_server/imageUploads/';

String establishmentQRID = '';
String guestQRID = '';

void main() {
  runApp(MyApp());
}

Future<String> justTesting() async{
  final insideLink = await http.get(serverURL);
  print(insideLink.body);
  return insideLink.body;
  // POST EXAMPLE
  // var headers = {'Content-Type': 'application/json'};
  // var body = {'estQR':establishmentQRID,'guestQR':guestQRID};
  // var postRes = await http.post('',headers:headers,body:body);
  // String postRes =(await http.post(logUser,body:body)).body;
  // return postRes;
}

Future<String> getUser(userQR) async{
  return (await http.post(getUserURL,body:{'qrInfo':userQR})).body;
}

Future<String> getEstablishment(userQR) async{
  return (await http.post(getEstablishmentURL,body:{'qrInfo':userQR})).body;
}

Future<String> logUser(String estQR,String guestQR) async{
  // var headers = {'Content-Type': 'application/json'};
  var body = {'qrInfoEst':estQR,'qrInfoInd':guestQR};
  // var postRes = await http.post('',headers:headers,body:body);
  String postRes =(await http.post(logUserURL,body:body)).body;
  return postRes;
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Guest Log Prototype',
      theme: ThemeData(
        // This is the theme of your application.
        //
        // Try running your application with "flutter run". You'll see the
        // application has a blue toolbar. Then, without quitting the app, try
        // changing the primarySwatch below to Colors.green and then invoke
        // "hot reload" (press "r" in the console where you ran "flutter run",
        // or simply save your changes to "hot reload" in a Flutter IDE).
        // Notice that the counter didn't reset back to zero; the application
        // is not restarted.
        primarySwatch: Colors.blue,
      ),
      home: MyHomePage(title: 'EngTech Global Solutions QR Code Guest Log Prototype'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  // This widget is the home page of your application. It is stateful, meaning
  // that it has a State object (defined below) that contains fields that affect
  // how it looks.

  // This class is the configuration for the state. It holds the values (in this
  // case the title) provided by the parent (in this case the App widget) and
  // used by the build method of the State. Fields in a Widget subclass are
  // always marked "final".

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  String _establishmentQR = '';
  String _establishmentName = 'No Establishment Set';
  String _guestName = '';
  String _guestDOB = '';
  String _guestNum = '';
  String _guestCompleteAddress = '';
  Container _nice;

  Container newImageFromLink(String url){
    return Container(
      width: 250,
      height: 250,
      child: Image.network(url),
    );
  }
  submitQRLog()  {
    logUser(establishmentQRID,guestQRID);
  }

  Future scanGuest() async {
    String barcodeScanRes;

    barcodeScanRes = await FlutterBarcodeScanner.scanBarcode(
        "#ff6666", "Cancel", true, ScanMode.QR);
    print(barcodeScanRes);

    Map<String, dynamic> linkRes = jsonDecode( await getUser(barcodeScanRes) );

    guestQRID = barcodeScanRes;
    print(linkRes['face_image']);
    Container WOW = await newImageFromLink(linkRes['face_image']??'');

    setState(() {
      _guestName = linkRes['first_name']+linkRes['middle_name']+linkRes['last_name']??'Not Found';
      _guestDOB = linkRes['date_of_birth']??'Not Found';
      _guestNum = linkRes['mobile_number']??'Not Found';
      _guestCompleteAddress = linkRes['country']??'Not Found';
      _nice = WOW;
    });
  }

  Future scanEstablishment() async {
    String barcodeScanRes;

    barcodeScanRes = await FlutterBarcodeScanner.scanBarcode(
        "#ff6666", "Cancel", true, ScanMode.QR);
    print(barcodeScanRes);

    Map<String, dynamic> linkRes = jsonDecode( await getEstablishment(barcodeScanRes) );

    establishmentQRID = barcodeScanRes;

    setState(() {
      _establishmentName = linkRes['establishment_name']??'Not Found';
    });
  }


  @override
  Widget build(BuildContext context) {
    // This method is rerun every time setState is called, for instance as done
    // by the _incrementCounter method above.
    //
    // The Flutter framework has been optimized to make rerunning build methods
    // fast, so that you can just rebuild anything that needs updating rather
    // than having to individually change instances of widgets.
    return Scaffold(
      appBar: AppBar(
        // Here we take the value from the MyHomePage object that was created by
        // the App.build method, and use it to set our appbar title.
        title: Text(widget.title),
      ),
      body: Center(
        // Center is a layout widget. It takes a single child and positions it
        // in the middle of the parent.
        child: Column(
          // Column is also a layout widget. It takes a list of children and
          // arranges them vertically. By default, it sizes itself to fit its
          // children horizontally, and tries to be as tall as its parent.
          //
          // Invoke "debug painting" (press "p" in the console, choose the
          // "Toggle Debug Paint" action from the Flutter Inspector in Android
          // Studio, or the "Toggle Debug Paint" command in Visual Studio Code)
          // to see the wireframe for each widget.
          //
          // Column has various properties to control how it sizes itself and
          // how it positions its children. Here we use mainAxisAlignment to
          // center the children vertically; the main axis here is the vertical
          // axis because Columns are vertical (the cross axis would be
          // horizontal).
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Container(
              margin: EdgeInsets.all(25),
              child: ElevatedButton(
                child: Text('New Guest', style: TextStyle(fontSize: 20.0),),
                onPressed: (){
                  scanGuest();
                },
              ),
            ),
            Text(
              '$_establishmentName' ?? 'No Establishment',
            ),
            Text(
              '$_guestName' ?? "Couldn't Load Value",
              style: Theme.of(context).textTheme.headline4,
            ),
            Text(
              '$_guestDOB' ?? "Couldn't Load Value",
              style: Theme.of(context).textTheme.headline4,
            ),
            Text(
              '$_guestNum' ?? "Couldn't Load Value",
              style: Theme.of(context).textTheme.headline4,
            ),
            Text(
              '$_guestCompleteAddress' ?? "Couldn't Load Value",
              style: Theme.of(context).textTheme.headline4,
            ),
            _nice = newImageFromLink('https://vectorified.com/images/no-profile-picture-icon-24.jpg'),
            Container(
              margin: EdgeInsets.all(25),
              child: ElevatedButton(
                child: Text('Accept', style: TextStyle(fontSize: 20.0),),
                onPressed: (){
                  submitQRLog();
                  guestQRID = '';
                  setState((){
                    _guestName = '';
                    _guestDOB = '';
                    _guestNum = '';
                    _guestCompleteAddress = '';
                    _nice = newImageFromLink('https://vectorified.com/images/no-profile-picture-icon-24.jpg');
                  });
                },
              ),
            ),
            Container(
              margin: EdgeInsets.all(25),
              child: ElevatedButton(
                child: Text('Cancel'),
                onPressed: () {
                  guestQRID = '';
                  setState((){
                    _guestName = '';
                    _guestDOB = '';
                    _guestNum = '';
                    _guestCompleteAddress = '';
                    _nice = newImageFromLink('https://vectorified.com/images/no-profile-picture-icon-24.jpg');
                  });
                },
              ),
            ),
          ],
        ),
      ),
      floatingActionButton: SpeedDial(
        /// both default to 16
        marginEnd: 18,
        marginBottom: 20,
        // animatedIcon: AnimatedIcons.menu_close,
        // animatedIconTheme: IconThemeData(size: 22.0),
        /// This is ignored if animatedIcon is non null
        icon: Icons.add,
        activeIcon: Icons.remove,
        // iconTheme: IconThemeData(color: Colors.grey[50], size: 30),

        /// The label of the main button.
        // label: Text("Open Speed Dial"),
        /// The active label of the main button, Defaults to label if not specified.
        // activeLabel: Text("Close Speed Dial"),
        /// Transition Builder between label and activeLabel, defaults to FadeTransition.
        // labelTransitionBuilder: (widget, animation) => ScaleTransition(scale: animation,child: widget),
        /// The below button size defaults to 56 itself, its the FAB size + It also affects relative padding and other elements
        buttonSize: 56.0,
        visible: true,

        /// If true user is forced to close dial manually
        /// by tapping main button and overlay is not rendered.
        closeManually: false,
        curve: Curves.bounceIn,
        overlayColor: Colors.black,
        overlayOpacity: 0.5,
        onOpen: () => print('OPENING DIAL'),
        onClose: () => print('DIAL CLOSED'),
        tooltip: 'Speed Dial',
        heroTag: 'speed-dial-hero-tag',
        backgroundColor: Colors.white,
        foregroundColor: Colors.black,
        elevation: 8.0,
        shape: CircleBorder(),
        // orientation: SpeedDialOrientation.Up,
        // childMarginBottom: 2,
        // childMarginTop: 2,
        children: [
          SpeedDialChild(
            child: Icon(Icons.add_business),
            backgroundColor: Colors.blue,
            label: 'Set Establishment',
            labelStyle: TextStyle(fontSize: 18.0),
            onTap: () => scanEstablishment(),
          ),
        ],

      )
    );
  }
}
