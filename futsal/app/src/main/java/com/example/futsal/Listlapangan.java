package com.example.futsal;

import android.os.Bundle;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class Listlapangan extends AppCompatActivity {
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
                "Lapangan 1","Lapangan 2"
        };
        ktr = new String[]{
                "harga 70.000/2 jam","harga 100.000/2 jam"
        };
        img = new String[] {
                Integer.toString(R.drawable.lapangan2) , Integer.toString(R.drawable.lapangan2)
        };

        mylist=new ArrayList<HashMap<String, String>>();
        for (int i=0; i<jdl.length; i++){
            map = new HashMap<String, String>();
            map.put("judul", jdl[i]);
            map.put("keterangan",ktr[i]);
            map.put("Gambar", img[i]);
            mylist.add(map);
        }
        adapter = new SimpleAdapter(this,mylist,R.layout.list_lapangan,
                new String[]{"judul","keterangan","Gambar"}, new int []{R.id.txt_judul,(R.id.txt_keterangan),(R.id.image) });
        listView.setAdapter(adapter);
    }

}
