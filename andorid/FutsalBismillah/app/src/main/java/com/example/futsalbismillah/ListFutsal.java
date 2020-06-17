package com.example.futsalbismillah;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class ListFutsal extends AppCompatActivity {
    ListView listView;
    Button kembali;
    SimpleAdapter adapter;
    HashMap<String, Object> map;
    ArrayList<HashMap<String, Object>> mylist;
    String[] jdl;
    String[] ktr;
    int[] img;

    @Override
    protected void onCreate(Bundle saveInstanceState) {
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_main_listfutsal);
        listView = (ListView) findViewById(R.id.list_view);
        kembali = findViewById(R.id.kembalilist);
        kembali.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(ListFutsal.this, MainActivity.class);
                startActivity(intent);
            }
        });
        jdl = new String[]{
                "Zona Futsal", "Elphasindo Futsal"
        };
        ktr = new String[]{
                "Jl.Mastrip 5 Jember", "Jl.Nias III Jember"
        };
        img = new int[]{
                R.drawable.gambar1, R.drawable.gambar2
        };

        mylist = new ArrayList<HashMap<String, Object>>();
        for (int i = 0; i < jdl.length; i++) {
            map = new HashMap<String, Object>();
            map.put("judul", jdl[i]);
            map.put("keterangan", ktr[i]);
            map.put("Gambar", Integer.toString(img[i]));
            mylist.add(map);
        }
        adapter = new SimpleAdapter(this, mylist, R.layout.activity_listfutsal,
                new String[]{"judul", "keterangan", "Gambar"}, new int[]{R.id.txt_judul, (R.id.txt_keterangan), (R.id.img)});
        listView.setAdapter(adapter);
    }
}