import {Controller, Get, Post, Put, Delete, Body, Param, UsePipes, ValidationPipe} from '@nestjs/common';
import {Film} from "../entity/Film.entity";
import {FilmsService} from "./films.service";
import {DeleteResult, UpdateResult} from "typeorm";

@Controller('films')
@UsePipes(new ValidationPipe())
export class FilmsController {


    constructor(private readonly filmsService: FilmsService){
    }

    @Get()
    findAll() : Promise<Film[]>{
        return this.filmsService.findAll();
    }

    @Get(':id')
    findOne(@Param() param): Promise<Film>{
        return this.filmsService.findOne(param.id);
    }

    @Post()
    create(@Body() film: Film):  Promise<boolean>{
        return this.filmsService.create(film);
    }

    @Delete(':id')
    remove(@Param() param): Promise<boolean>{
        return this.filmsService.remove(param.id);
    }

    @Put(':id')
    update(@Body() film: Film, @Param() param ):Promise<boolean>{
        return this.filmsService.update(film,param.id);
    }

}
