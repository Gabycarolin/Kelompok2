package com.example.futsalbismillah;

import android.os.Bundle;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.HashMap;
public class Listetiket extends AppCompatActivity {
    ListView listView;
    SimpleAdapter adapter;
    HashMap<String, Object> map;
    ArrayList<HashMap<String, Object>> mylist;
    String[] jdl;
    String[] ktr;
    String [] ktr_tgl;
    int[] img;

    @Override
    protected void onCreate(Bundle saveInstanceState) {
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_main_listetiket);
        listView = (ListView) findViewById(R.id.list_view);
        jdl = new String[]{
                "Zona Futsal", "Elphasindo Futsal"
        };
        ktr = new String[]{
                "E41180998", "E41180999"
        };
        img = new int[]{
                R.drawable.listetiket, R.drawable.listetiket
        };
        ktr_tgl = new String[]{
                "Senin 24 Mei 2020","Minggu 1 Mei 2020"
        };

        mylist = new ArrayList<HashMap<String, Object>>();
        for (int i = 0; i < jdl.length; i++) {
            map = new HashMap<String, Object>();
            map.put("judul", jdl[i]);
            map.put("keterangan", ktr[i]);
            map.put("Tanggal", ktr_tgl[i]);
            map.put("Gambar", Integer.toString(img[i]));
            mylist.add(map);
        }
        adapter = new SimpleAdapter(this, mylist, R.layout.activity_listetiket,
                new String[]{"judul", "keterangan","tanggal", "Gambar"}, new int[]{R.id.txt_judul, (R.id.txt_keterangan),(R.id.txt_tanggal), (R.id.img)});
        listView.setAdapter(adapter);
    }
}