package com.example.futsalbismillah;


import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class Riwayat extends AppCompatActivity {
    ListView listView;
    Button kembali;
    SimpleAdapter adapter;
    HashMap<String, String> map;
    ArrayList<HashMap<String,String>> mylist;
    String[] jdl;
    String [] ktr;
    String [] ktr2;
    String [] ktr3;
    String [] img;
    @Override
    protected void onCreate(Bundle saveInstanceState){
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_main_riwayat);
        listView = (ListView) findViewById(R.id.list_view);
        kembali = findViewById(R.id.kembaliriwayat);
        kembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Riwayat.this, MainActivity.class);
                startActivity(intent);
            }
        });
        jdl = new String[] {
                "Zona Futsal","Elphasindo Futsal"
        };
        ktr = new String[]{
                "LAPANGAN 1","LAPANGAN 1"
        };
        ktr2 = new String[]{
                "20-3-2020 08.00-10.00 / 2 jam", "15-5-2020 18.00-20.00 / 2 jam"
        };
        ktr3 = new String[]{
                "Kode Booking : RL9O011T7","Kode Booking : 09LK011T7"
        };
        img = new String[] {
                Integer.toString(R.drawable.logoriwayat),Integer.toString(R.drawable.logoriwayat)
        };

        mylist=new ArrayList<HashMap<String, String>>();
        for (int i=0; i<jdl.length; i++){
            map = new HashMap<String, String>();
            map.put("judul", jdl[i]);
            map.put("keterangan",ktr[i]);
            map.put("keterangan2",ktr2[i]);
            map.put("keterangan3",ktr3[i]);
            Log.d("pesan", img[i]);
            map.put("Gambar", img[i]);
            mylist.add(map);
        }
        adapter = new SimpleAdapter(this,mylist,R.layout.activity_riwayat,
                new String[]{"judul","keterangan","keterangan2","keterangan3","Gambar"}, new int []{R.id.txt_judul,(R.id.txt_keterangan),(R.id.txt_keterangan2),(R.id.txt_keterangan3),(R.id.img) });
        listView.setAdapter(adapter);
    }


}
