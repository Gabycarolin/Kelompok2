package com.example.futsal;

import android.os.Bundle;
import android.util.Log;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class Listfutsal extends AppCompatActivity {
    ListView listView;
    SimpleAdapter adapter;
    HashMap<String, String> map;
    ArrayList<HashMap<String,String>> mylist;
    String[] jdl;
    String [] ktr;
    String [] img;
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
    img = new String[] {
                Integer.toString(R.drawable.futsal1) , Integer.toString(R.drawable.futsal2)
    };

    mylist=new ArrayList<HashMap<String, String>>();
    for (int i=0; i<jdl.length; i++){
        map = new HashMap<String, String>();
        map.put("judul", jdl[i]);
        map.put("keterangan",ktr[i]);
        Log.d("pesan", img[i]);
        map.put("Gambar", img[i]);
        mylist.add(map);
    }
    adapter = new SimpleAdapter(this,mylist,R.layout.list_futsal,
            new String[]{"judul","keterangan","Gambar"}, new int []{R.id.txt_judul,(R.id.txt_keterangan),(R.id.image) });
    listView.setAdapter(adapter);
    }

}
