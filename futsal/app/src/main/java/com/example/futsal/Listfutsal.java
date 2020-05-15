package com.example.futsal;

import android.content.Intent;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.content.Intent;
import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class Listfutsal extends AppCompatActivity {
    ListView listView;
    SimpleAdapter adapter;
    HashMap<String, Object> map;
    ArrayList<HashMap<String,Object>> mylist;
    String[] jdl;
    String [] ktr;
    int[] img;
    @Override
    protected void onCreate(Bundle saveInstanceState){
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_main);
        listView = (ListView) findViewById(R.id.list_view);
    jdl = new String[] {
            "Zona Futsal","Elphasindo Futsal"
    };
    ktr = new String[]{
            "Jl.Mastrip 5 Jember","Jl.Nias III Jember"
    };
    img = new int[] {
                R.drawable.gambar1 , R.drawable.gambar2
    };

    mylist=new ArrayList<HashMap<String, Object>>();
    for (int i=0; i<jdl.length; i++){
        map = new HashMap<String, Object>();
        map.put("judul", jdl[i]);
        map.put("keterangan",ktr[i]);
        map.put("Gambar",Integer.toString(img[i]));
        mylist.add(map);
    }
    adapter = new SimpleAdapter(this,mylist,R.layout.list_futsal,
            new String[]{"judul","keterangan","Gambar"}, new int []{R.id.txt_judul,(R.id.txt_keterangan),(R.id.img) });
    listView.setAdapter(adapter);
    }
 //   setContentView(R.layout.list_futsal);
   // TextView btn = (TextView) findViewById(R.id.txt_judul);
    //public void onClick(View arg0) {
      //  Intent inte = new Intent(Listfutsal.this, Booking.class);
        //startActivity(inte);

    //}

}
